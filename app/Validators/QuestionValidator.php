<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class QuestionValidator.
 *
 * @package namespace App\Validators;
 */
class QuestionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'description'           => 'required', 
            'evaluation_form_id'    => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
