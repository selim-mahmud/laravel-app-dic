<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:18 PM
 */

namespace App\Services;

use App\Contracts\LoginContract;
use Illuminate\Support\Facades\Auth;

class Login implements LoginContract
{
    /**
     * {@inheritdoc}
     */
    public function login(array $inputs, string $loginType)
    {
        if ($loginType === config('dic.email_login_name')) {
            $remember = false;
            if (isset($inputs['remember'])) {
                $remember = true;
            }
            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password'], 'status' => 'active'], $remember)) {
                return true;
            }
        }
        return false;
    }
}