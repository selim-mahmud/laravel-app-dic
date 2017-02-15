<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\LoginContract;
use App\Mail\passwordReset;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginService
{
    /**
     * @var LoginContract $loginContract
     */
    protected $loginContract;

    /**
     * @var $user User
     */
    protected $user;

    /**
     * LoginService constructor.
     * @param LoginContract $loginContract
     */
    public function __construct(LoginContract $loginContract, User $user)
    {
        $this->loginContract = $loginContract;
        $this->user = $user;
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

    /**
     * sends password reset link email
     *
     * @param string $email
     * @return bool
     */
    public function sendPasswordResetLink(string $email) : bool
    {
        $key = str_random(40);
        $user = $this->user::where('email', $email)->firstOrFail();
        $user->reset_key = $key;
        if($user->save()){
            $resetLink = config('dic.password_reset_base_link').$key;
            return Mail::to($email)->queue(new passwordReset($user, $resetLink));
        }
        return false;
    }
}