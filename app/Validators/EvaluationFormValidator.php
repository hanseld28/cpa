<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class EvaluationFormValidator.
 *
 * @package namespace App\Validators;
 */
class EvaluationFormValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title'         => 'required',  
            'begin_date'    => 'required', 
            'end_date'      => 'required', 
            'user_type_id'  => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];


    
}
