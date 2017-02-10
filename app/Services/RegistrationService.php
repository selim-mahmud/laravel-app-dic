<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;

class RegistrationService
{
    protected $registrationContract;

    public function __construct(RegistrationContract $registrationContract)
    {
        $this->registrationContract = $registrationContract;
    }

    public function schoolRegistration(){
        return $this->registrationContract->register();
    }
}