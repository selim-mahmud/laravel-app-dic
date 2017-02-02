<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:37 PM
 */

namespace App\Helpers;


use Illuminate\Http\Request;

class Dic
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getUrlPath(){
        return explode("/", $this->request->path());
    }

    public function makeUrl($path){
        return strtolower(str_replace(' ', '-', $path));
    }

    public function makeUnUrl($path){
        return ucwords(str_replace('-', ' ', $path));
    }
}