<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserType.
 *
 * @package namespace App\Entities;
 */
class UserType extends Model implements Transformable
{
    use TransformableTrait;
    use Notifiable;
    use SoftDeletes;
    
    public $timestamps = true;
    protected $table = 'user_types';
    protected $fillable = ['name'];
    protected $hidden = [];

}
