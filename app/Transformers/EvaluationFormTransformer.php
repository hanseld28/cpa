<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\EvaluationForm;

/**
 * Class EvaluationFormTransformer.
 *
 * @package namespace App\Transformers;
 */
class EvaluationFormTransformer extends TransformerAbstract
{
    /**
     * Transform the EvaluationForm entity.
     *
     * @param \App\Entities\EvaluationForm $model
     *
     * @return array
     */
    public function transform(EvaluationForm $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
