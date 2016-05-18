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

}