<?php

namespace App\Presenters;

use App\Transformers\EvaluationFormTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EvaluationFormPresenter.
 *
 * @package namespace App\Presenters;
 */
class EvaluationFormPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EvaluationFormTransformer();
    }
}
