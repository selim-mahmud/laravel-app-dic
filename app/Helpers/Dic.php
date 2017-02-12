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

    /**
     * Dic constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * returns each section of current url in an array
     *
     * @return array
     */
    public function getUrlPath(){
        return explode("/", $this->request->path());
    }

    /**
     * makes a string ready for section of url
     *
     * @param $path
     * @return string
     */
    public function makeUrl($path){
        return strtolower(str_replace(' ', '-', $path));
    }

    /**
     * makes section of url capitalized space separated
     *
     * @param $path
     * @return string
     */
    public function makeUnUrl($path){
        return ucwords(str_replace('-', ' ', $path));
    }

}