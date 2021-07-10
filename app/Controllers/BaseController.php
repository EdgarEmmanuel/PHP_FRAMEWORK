<?php

namespace App\Controllers;


class BaseController {

    protected static function view($viewName){
        return self::returnView($viewName);
    }


    private static function returnView($fileName){
        $val = explode(".",$fileName);
        $number = count($val);
        

        $path = null;
        if($number==1){
            if (file_exists(SRC_VIEWS.$val[0].".php")) {
               $path = SRC_VIEWS."{$val[0]}.php";
               //include_once($path);
            }
        } else {
            $ArrayPageWithSlash = explode("/",$fileName);
            if($ArrayPageWithSlash==1){
                if(file_exists(SRC_VIEWS.$ArrayPageWithSlash[0].".php")){
                    $path = SRC_VIEWS."{$ArrayPageWithSlash[0]}.php";
                   // include_once($path);
                }
            }
        }

        include_once($path);
        
    }

}