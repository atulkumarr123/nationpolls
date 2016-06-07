<?php

namespace App\Helpers;

use App\Country;
use App\GeoLocs;
use App\Option;
use App\CountriesPollsApplicableOn;
use App\OptionsPolls;
use Illuminate\Support\Collection;

class ControllerHelper{

    public static function deUnderScoreIt($string){
        $deHyphenized = str_replace('_', ' ',$string);
        return $deHyphenized;
    }
    public static function replaceTiltSymbolWIthQsnMarkIt($string){
        $deHyphenized = str_replace('~', '?',$string);
        return $deHyphenized;
    }
    public static function deProcessTheDirName($string){
        $directoryName = ControllerHelper::deUnderScoreIt($string);
        $directoryName = ControllerHelper::replaceTiltSymbolWIthQsnMarkIt($directoryName);
        return $directoryName;
    }
    public static function processTheDirName($string){
        $directoryName = ControllerHelper::underScoreIt($string);
        $directoryName = ControllerHelper::replaceQuestionMark($directoryName);
        return $directoryName;
    }

    public static function underScoreIt($string){
        $hyphenizedd = str_replace(' ', '_',$string);
        return $hyphenizedd;
    }
    public static function replaceQuestionMark($string){
        $underScored = str_replace('?', '~',$string);
        return $underScored;
    }
    public static function removeDots($string){
        $underScored = str_replace('.', '',$string);
        return $underScored;
    }
    public static function  processCoverImage($request){
            $directoryName = ControllerHelper::processTheDirName($request->get('title'));
            $imageName = ControllerHelper::removeDots($directoryName);

            $imageName = $imageName.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path().'/public/images/'.$directoryName, $imageName);
        return $imageName;
    }

    public static function  saveOptions($poll,$request){
        $optionsFromRequest = $request->get('options');
        for ($counter = 0; $counter < count($optionsFromRequest); $counter++) {
            if (!Option::lists('id')->contains($optionsFromRequest[$counter])) {
                $option = Option::create(['option' => $optionsFromRequest[$counter]]);
                $option->save();
                $optionsFromRequest[$counter] = $option->id;
            }
        }
//        dd($optionsFromRequest);
        $poll->options()->sync($optionsFromRequest);
    }

    public static function  handleAndSaveGeoLocs($poll,$request){
        $geoLoc = GeoLocs::find($poll->geo_locs_id);
        if($geoLoc->name=='Across the world'){

        }
        else if($geoLoc->name=='Country'){
            $countries = $request->get('countries');
            for ($counter = 0; $counter < count($countries); $counter++) {
                if($countries[$counter]!=''){
                $countriesPollsApplicableOn = CountriesPollsApplicableOn::create(['poll_id' => $poll->id,
                    'country_id' => $countries[$counter]]);
                $countriesPollsApplicableOn->save();
                }
            }
        }

    }


    public static function  handleAndSynchGeoLocs($poll,$request){
        $geoLoc = GeoLocs::find($poll->geo_locs_id);
        if($geoLoc->name=='Country'){
            $countries = $request->get('countries');
            for ($counter = 0; $counter < count($countries); $counter++) {
                if (!Country::lists('id')->contains($countries[$counter])) {
                    $country = Country::create(['name' => $countries[$counter]]);
                    $country->save();
                    $countries[$counter] = $country->id;
                }
            }
            $poll->countries()->sync($countries);
        }
    }

    public static function  updateOptions($poll,$request){
            $options = $request->get('options');
            for ($counter = 0; $counter < count($options); $counter++) {
                if (!Option::lists('id')->contains($options[$counter])) {
                    $option = Option::create(['option' => $options[$counter]]);
                    $option->save();
                    $options[$counter] = $option->id;
                }
            }
            $poll->options()->sync($options);
        }

    public static function  locationsOfThisPoll($poll,$id)
    {
        $geoLoc = GeoLocs::find($poll->geo_locs_id);
        $locationsPollsApplicableOn = new Collection();
        if ($geoLoc->name == 'Across The World') {
            $locationsPollsApplicableOn = 'Across The World';
        } else if ($geoLoc->name == 'Country') {
            $countriesPollsApplicableOn = CountriesPollsApplicableOn::where('poll_id', $id)->get()->toArray();
            for ($counter = 0; $counter < count($countriesPollsApplicableOn); $counter++) {
                $singleCountryPollDatum = $countriesPollsApplicableOn[$counter];
                $locationsPollsApplicableOn->push(Country::find($singleCountryPollDatum['country_id'])->name);
            }
        }
        return $locationsPollsApplicableOn;
    }
}