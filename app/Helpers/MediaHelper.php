<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:37 PM
 */

namespace App\Helpers;

use Illuminate\Http\Request;

class MediaHelper
{
    protected $request;

    /**
     * MediaHelper constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $name
     * @param $location
     * @return string
     */
    public function savePhoto($name, $location)
    {
        $path = '';
        if ($this->request->hasFile('photo')) {
            $photoName = $name . $this->request->photo->extension();
            $path = $this->request->photo->storeAs($location, $photoName);
        }
        return $path;
    }
}