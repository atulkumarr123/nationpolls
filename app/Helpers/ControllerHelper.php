<?php

namespace App\Helpers;

use App\Country;
use App\GeoLocs;
use App\Option;
use App\CountriesPollsApplicableOn;
use App\OptionsPolls;

class ControllerHelper{

    public static function underScoreIt($string){
        $underScored = str_replace(' ', '_',$string);
        $underScored = ControllerHelper::removeQuestionMark($underScored);
        return $underScored;
    }
    public static function removeQuestionMark($string){
        $underScored = str_replace('?', '',$string);
        return $underScored;
    }

    public static function  processCoverImage($request){
            $underScoredImageName = ControllerHelper::underScoreIt($request->get('title') . '.' .$request->file('image')->getClientOriginalExtension());
            $underScoredTitle = ControllerHelper::underScoreIt($request->get('title'));
            $request->file('image')->move(
                base_path().'/public/images/'.$underScoredTitle, $underScoredImageName);
        return $underScoredImageName;
    }

    public static function  saveOptions($poll,$request){
        $optionsFromRequest = $request->get('options');
        for ($counter = 0; $counter < count($optionsFromRequest); $counter++) {
            if (!Option::lists('id')->contains($optionsFromRequest[$counter])) {
                $option = Option::create(['name' => $optionsFromRequest[$counter]]);
                $option->save();
                $optionsFromRequest[$counter] = $option->id;
            }
        }
        $poll->options()->sync($optionsFromRequest);
    }

    public static function  handleAndSaveGeoLocs($poll,$request){
        $geoLoc = GeoLocs::find($poll->geo_locs_id);
        if($geoLoc->name=='Country'){
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
}