<?php

namespace App\Presenters;

use App\Transformers\UserCredentialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserCredentialPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserCredentialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserCredentialTransformer();
    }
}
