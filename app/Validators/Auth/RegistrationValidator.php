<?php

namespace App\Validators\Auth;

use App\Models\Registration;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RegistrationValidator.
 *
 * @package namespace App\Validators\Auth;
 */
class RegistrationValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            Registration::FIRST_NAME => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
