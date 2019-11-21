<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\EvaluationFormRepository;
use App\Validators\EvaluationFormValidator;

class EvaluationFormService
{
	private $repository;
	private $validator;
    
    public function __construct(EvaluationFormRepository $repository, EvaluationFormValidator $validator)
	{
		$this->repository 	= $repository;
		$this->validator 	= $validator;
	}
    
    public function store($data)
	{
		try
		{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$evaluationForm = $this->repository->create($data);
			return [
				'success' 	=> true,
				'messages' 	=> "Formulário criado",
				'data' 	  	=> $evaluationForm,
			];
		}
		catch(Exception $exception)
		{
			switch(get_class($exception))
			{
				case QueryException::class 		:  return ['success' => false, 'messages' => $e->getMessage()];
				case ValidatorException::class 	:  return ['success' => false, 'messages' => $e->getMessageBag()];
				case Exception::class 			:  return ['success' => false, 'messages' => $e->getMessage()];
				default 						:  return ['success' => false, 'messages' => get_class($e)];
			}
		}
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}