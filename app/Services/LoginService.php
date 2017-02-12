<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\LoginContract;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @var LoginContract $loginContract
     */
    protected $loginContract;

    /**
     * LoginService constructor.
     * @param LoginContract $loginContract
     */
    public function __construct(LoginContract $loginContract)
    {
        $this->loginContract = $loginContract;
    }

    /**
     * get user logged in using email
     *
     * @param array $inputs
     * @return array
     */
    public function loginByEmail(array $inputs)
    {
        $response = $this->loginContract->login($inputs, config('dic.email_login_name'));
        if ($response) {
            return [true, Auth::user()->user_type];
        }
        return [false, false];
    }
}