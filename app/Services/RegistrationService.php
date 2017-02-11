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
    const LEARNER_USER_TYPE_NAME = 'learner';
    /**
     * @var $registrationContract RegistrationContract
     */
    protected $registrationContract;

    /**
     * RegistrationService constructor.
     * @param RegistrationContract $registrationContract
     */
    public function __construct(RegistrationContract $registrationContract)
    {
        $this->registrationContract = $registrationContract;
    }

    /**
     * register user as learner
     *
     * @param array $inputs
     * @return bool
     */
    public function RegisterAsLearner(array $inputs){
        return $this->registrationContract->register($inputs, self::LEARNER_USER_TYPE_NAME);
    }
}