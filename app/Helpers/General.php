<?php

namespace App\Helpers;

class General
{
    public static function currentPath(){
    	$currentPath = explode("/", $_SERVER["REQUEST_URI"]);
    	array_shift($currentPath);
        return array_filter($currentPath);
    }
    
    public static function getDisplayName($name) {
        $name_array = explode(" ",$name);
        $display_name="";
        foreach ($name_array as $part_name){
            if(strlen($part_name)>=3){
                $display_name=$part_name;
                break;
            }
        }
        return $display_name;
    }



}