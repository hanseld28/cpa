<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EvaluationFormRepository;
use App\Entities\EvaluationForm;
use App\Validators\EvaluationFormValidator;

/**
 * Class EvaluationFormRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EvaluationFormRepositoryEloquent extends BaseRepository implements EvaluationFormRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EvaluationForm::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EvaluationFormValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
