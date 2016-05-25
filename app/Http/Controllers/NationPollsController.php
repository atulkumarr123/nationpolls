<?php

namespace App\Http\Controllers;

use App\Article;
use App\CountriesPollsApplicableOn;
use App\City;
use App\GeoLocs;
use App\Http\Requests\Request;
use GeoIP;
use App\ArticleDetail;
use App\Category;
use App\Continent;
use App\Subcontinent;
use App\Country;
use App\StateProvince;
use App\Town;
use App\Http\Requests\NationPollRequest;
use App\Http\Requests\PolledDataRequest;
use App\Http\Requests\CountryDataAjaxRequest;
use App\Http\Requests\ArticleRequest;
use App\Option;
use App\Poll;
use App\PolledData;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ControllerHelper;
use Illuminate\Support\Facades\Redirect;

class NationPollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        Session::forget('locationMismatchData');
        // Temporarily increase memory limit to 256MB
        $polls = Poll::orderBy('updated_at','desc')->get();
//        $this->dumpDataInDB();
        return view('home')->with('polls', $polls);
    }

    public function show($id)
    {
        return $this->runningPoll($id);
    }

    public function updatePolledData(PolledDataRequest $request,$id)
    {
        $clientMachineIP = $request->ip();
        DB::beginTransaction();
        try {
            $polledData = PolledData::where('voter_machine_ip', $clientMachineIP)
                ->where('poll_id',$id)->get()->first();
            if ($polledData != null) {
                Flash::warning('oops! looks like you have already cast your vote');
                return $this->runningPoll($id);
            }
            $this->validateTheLocationAndUpdatePolledData($request,$id);
            DB::commit();

        }
        catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
            return $this->runningPoll($id);
}
    public function validateTheLocationAndUpdatePolledData($request,$id){
        $clientMachineIP = $request->ip();
        $clientLocation = GeoIP::getLocation($clientMachineIP);
        if($request->get('resolvedClientLocation')!=null){
            $clientCountryIsoCode = $request->get('resolvedClientLocation');
        }
        else{
        $clientCountryIsoCode = $clientLocation['isoCode'];
        }
        $poll = Poll::find($id);
        $geoLoc = GeoLocs::find($poll->geo_locs_id);
        $countriesPollsApplicableOn = emptyArray();
        $unMatched = true;
        if($geoLoc->name=='Country'){
            $countriesPollsApplicableOn = CountriesPollsApplicableOn::where('poll_id', $id)->get()->toArray();
        }
        for ($counter = 0; $counter < count($countriesPollsApplicableOn); $counter++) {
            $singleCountryPollDatum = $countriesPollsApplicableOn[$counter];
            $country = Country::find($singleCountryPollDatum['country_id']);
            if($clientCountryIsoCode==$country->country_iso_code){
                $polledData = PolledData::create(['option' => $request->get('option'),
                    'poll_id' => $id,
                    'voter_machine_ip' => $request->ip(),]);
                $polledData->save();
                $unMatched = false;
                Flash::success('Thanks for casting your vote');}
        }
        if($unMatched){
            $this->pepareAndReturnTheMsgToHandleMismatchedLocation($request,$countriesPollsApplicableOn);}

    }
    public function pepareAndReturnTheMsgToHandleMismatchedLocation($request,$countriesPollsApplicableOn){
        $countrieNamesPollsApplicableOn = new Collection();
        $countryISOCodesPollsApplicableOn = new Collection();
        for ($counter = 0; $counter < count($countriesPollsApplicableOn); $counter++) {
            $singleCountryPollDatum = $countriesPollsApplicableOn[$counter];
            $countrieNamesPollsApplicableOn->push(Country::find($singleCountryPollDatum['country_id'])->name);
            $countryISOCodesPollsApplicableOn->push(Country::find($singleCountryPollDatum['country_id'])->country_iso_code);

        }
        $locationMismatchData = collect([
            ['optionToBeSelected' => $request->get('option')],
            ['locationMismatch' => 'unMatched'],
            ['countriesPollsApplicableOn' => $countrieNamesPollsApplicableOn],
            ['countryISOCodesPollsApplicableOn' => $countryISOCodesPollsApplicableOn],
        ]);
        $request->session()->put('locationMismatchData', $locationMismatchData);
        return  redirect()->back();
    }
    public function runningPoll($id){
        $poll = Poll::find($id);
        $totalPolledData = PolledData::where('poll_id', $poll->id)->get();
        $options = $poll->options()->get();
        $polledData = collect([]);
        if ($totalPolledData->count()!=0) {
            foreach ($options as $option) {
                $polledDataForOneOption = PolledData::where('option', $option->option)->get();
                $polledData->put($option->option, ((count($polledDataForOneOption)*100)/(count($totalPolledData))));
            }
        }

        return view('pollToday')->with(compact('poll','options','polledData'));
    }
    public function create()
    {
        $categories = [''=>'']+Category::lists('label','id')->all();
        $selectedCategory = emptyArray();
        $options = emptyArray();
        $selectedOptions = emptyArray();
        $geolocs = [''=>'']+GeoLocs::lists('name','id')->all();
        $selectedGeoLocs = emptyArray();
        $countries = [''=>'']+Country::lists('name','id')->all();
        $selectedCountries = emptyArray();
        return view('newPoll')->with(compact('countries','selectedCountries',
            'geolocs','selectedGeoLocs','categories',
            'selectedCategory','options','selectedOptions'));
    }

    public function store(NationPollRequest $request)
    {
        DB::beginTransaction();
        try {
            $imageName = ControllerHelper::processCoverImage($request);
            $poll = Poll::create(['title' => $request->get('title'),
                'category' => $request->get('category'),
                'geo_locs_id' => $request->get('geoloc'),
                'img_name' => $imageName,
                'poll_duration' => $request->get('pollDuration')
            ]);
            $poll->save();
            ControllerHelper::handleAndSaveGeoLocs($poll,$request);
            ControllerHelper::saveOptions($poll,$request);
            DB::commit();
                Flash::overlay('congratulations! your poll is live');
        } catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
        return redirect('/');
    }

    public function dumpDataInDB(){
        ini_set('memory_limit','1024M');
        ini_set('max_execution_time', 300000);
        try {
            DB::beginTransaction();
            $handle = fopen(storage_path('countries.txt'),"r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $countryCode = trim(substr($line, 0,2));
                    $countryName = trim(substr($line,10));
                    $continent = Country::create([
                        'country_iso_code' => $countryCode,
                        'name' => $countryName,
                        'parent_region_id' => 10]);
                    $continent->save();
//                    DB::commit();
                }
                fclose($handle);
            } else {
                // error opening the file.
            }
            DB::commit();
        }
        catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
    }

    public function countries()
    {
        $searchKey = Input::get('term');
        $countries = Country::where('name', 'LIKE', '%'.$searchKey.'%')->get();
        foreach ($countries as $key => $value) {
            $list[$key]['id'] = $value->id;
            $list[$key]['text'] = $value->name;
        }
        return json_encode($list);
    }
}

