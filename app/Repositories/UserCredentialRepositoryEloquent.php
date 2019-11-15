<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserCredentialRepository;
use App\Entities\UserCredential;
use App\Validators\UserCredentialValidator;

/**
 * Class UserCredentialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserCredentialRepositoryEloquent extends BaseRepository implements UserCredentialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserCredential::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserCredentialValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
