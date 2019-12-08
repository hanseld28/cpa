<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Question.
 *
 * @package namespace App\Entities;
 */
class Question extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable     = ['description', 'evaluation_form_id'];
    public    $timestamps   = true;

    
    public function evaluationForm(){
        return $this->belongsTo(EvaluationForm::class);
    }
}
