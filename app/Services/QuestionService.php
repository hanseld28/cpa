<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\QuestionRepository;
use App\Validators\QuestionValidator;

class QuestionService
{
    private $repository;
    private $validator;

    public function __construct(QuestionRepository $repository, QuestionValidator $validator)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function store($data)
    {
        //dd($data);
        try 
        {
            //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            foreach ($data['questions'] as $value) {
                
                $questions = $this->repository->create([
                    'description'           => $value,
                    'evaluation_form_id'    => $data['evaluation_form_id']
                ]);
            }

            return [
				'success' 	=> true,
				'messages' 	=> "Questões salvas com sucesso!",
				'data' 	  	=> $questions,
			];
        } 
        catch (Exception $e) 
        {
            
            switch(get_class($e))
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