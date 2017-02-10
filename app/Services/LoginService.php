<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\LoginContract;

class LoginService
{
    protected $loginContract;

    public function __construct(LoginContract $loginContract)
    {
        $this->loginContract = $loginContract;
    }

    public function loginByEmail(){
        return $this->loginContract->login();
    }
}