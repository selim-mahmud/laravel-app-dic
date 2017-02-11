<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:18 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;

class Registration implements RegistrationContract
{
    const LEARNER_USER_TYPE_NAME = 'learner';

    /**
     * {@inheritdoc}
     */
    public function register(array $inputs, string $userType)
    {
        if (self::LEARNER_USER_TYPE_NAME === $userType) {
            return false;
        }
    }
}