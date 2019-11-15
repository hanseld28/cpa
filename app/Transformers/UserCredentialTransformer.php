<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserCredential;

/**
 * Class UserCredentialTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserCredentialTransformer extends TransformerAbstract
{
    /**
     * Transform the UserCredential entity.
     *
     * @param \App\Entities\UserCredential $model
     *
     * @return array
     */
    public function transform(UserCredential $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
