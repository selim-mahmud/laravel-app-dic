<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:18 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;
use App\User;
use Illuminate\Support\Facades\Hash;

class Registration implements RegistrationContract
{
    const LEARNER_USER_TYPE_NAME = 'learner';

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function register(array $inputs, string $userType)
    {
        if (self::LEARNER_USER_TYPE_NAME === $userType) {
            $this->user->name = $inputs['name'];
            $this->user->display_name = $inputs['display_name'];
            $this->user->email = $inputs['email'];
            $this->user->pass_key = Hash::make($inputs['password']);
        }

        return $this->user->save();
    }
}