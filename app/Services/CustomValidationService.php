<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use Illuminate\Validation\Validator;

class CustomValidationService
{
    /**
     * Validate a name using the following rules:
     * 1) Must start and end one of the following: a letter, apostrophe, dash, full stop or hyphen
     * 2) Can contain all characters listed above with the addition of spaces
     *
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     *
     * @return bool
     */
    public function validateName(string $attribute, string $value, array $parameters, Validator $validator): bool
    {
        if (is_string($value) &&
            preg_match('/^[a-zA-Z\-\.\']+$|^[a-zA-Z\-\.\'][a-zA-Z\-\.\' ]+[a-zA-Z\-\.\']$/', $value) === 1) {
            return true;
        } else {
            return false;
        }
    }
}