<?php

namespace App\Services;

use Hash;
use App\Models\{
    Complaint,
    TemporaryFile
};
use Illuminate\Validation\Validator;

class CustomValidation extends Validator {

    public function validateFullName($attribute, $value, $parameters) {
        return preg_match("/^[a-zA-Z\.'\s]+$/", $value);
    }

    public function validatePhone($attribute, $value, $parameters) {
        return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
    }

    /**
     * Validator for alphabetic chracters and spaces.
     *
     * @param type $attribute        	
     * @param type $value        	
     * @param type $parameters        	
     * @return type
     */
    public function validateAlphaSpaces($attribute, $value, $parameters) {
        return preg_match('/^[\pL\s.\.]+$/u', $value);
    }

    /**
     * Validator for alphabetic chracters, dash, spaces and numbers.
     *
     * @param type $attribute        	
     * @param type $value        	
     * @param type $parameters        	
     * @return type
     */
    public function validateAlphaSpacesNum($attribute, $value, $parameters) {
        return preg_match('/^[\pL\s.\-.0-9]+$/u', $value);
    }

    public function validateMobileNumber($attribute, $value, $parameters) {
        return preg_match('/^[789]\d{9}$/', $value);
    }

    public function validateHash($attribute, $value, $parameters) {
        return Hash::check($value, $parameters [0]);
    }

    public function validateEnvironment($attribute, $value, $parameters) {
        return $value === config('app.env');
    }

    public function validateGitBranch($attribute, $value, $parameters) {
        return $value === config('deploy.git.pull_branch');
    }

}
