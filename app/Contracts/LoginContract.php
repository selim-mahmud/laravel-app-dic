<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:06 PM
 */

namespace App\Contracts;

interface LoginContract
{
    /**
     * login user
     *
     * @param array $inputs
     * @param string $loginType
     * @return bool
     */
    public function login(array $inputs, string $loginType);
}