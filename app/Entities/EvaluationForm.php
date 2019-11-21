<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EvaluationForm.
 *
 * @package namespace App\Entities;
 */
class EvaluationForm extends Model implements Transformable
{
    use TransformableTrait;
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $table = 'evaluation_forms';
    protected $fillable = ['title', 'description', 'begin_date', 'end_date', 'user_type_id'];

}
