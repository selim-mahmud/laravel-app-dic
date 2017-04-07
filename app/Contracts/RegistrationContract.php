<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:06 PM
 */

namespace App\Contracts;

interface RegistrationContract
{
    /**
     * register new user using registration form
     *
     * @param array $inputs
     * @param string $userType
     * @return bool
     */
    public function register(array $inputs, string $userType);
}