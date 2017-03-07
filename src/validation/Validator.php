<?php

namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator
{
    public function isValid($validation_data)
    {
        $errors = [];
        foreach ($validation_data as $name => $value) {
            $rules = explode("|", $value);

            foreach ($rules as $rule) {
                $exploded = explode(":", $rule);

                switch ($exploded[0]) {
                    case 'min':
                    $min = $exploded[1];
                    if (Valid::stringType()->length($min)->validate($_REQUEST[$name]) == false) {
                        $errors[] = $name . " must be at least " . $min . " characters long";
                    }
                    break;
                    case 'email':
                    if (Valid::email()->validate($_REQUEST[$name]) == false) {
                        $errors[] = $name . " must be a valid email address";
                    }
                    break;
                    case 'equalTo':
                    if (Valid::equals($_REQUEST[$name])->validate($_REQUEST[$exploded[1]]) == false) {
                        $errors[] = "Value does not match verification value";
                    }
                    break;
                    default:
                        $errors = "No value found";
                    break;
                }
            }
        }
        return $errors;
    }
}
