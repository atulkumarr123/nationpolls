<?php

namespace App\Helpers;



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

}