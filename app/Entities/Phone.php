<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Phone.
 *
 * @package namespace App\Entities;
 */
class Phone extends Model implements Transformable
{
    use TransformableTrait;
    use Notifiable;
    use SoftDeletes;
    
    public $timestamps = true;
    protected $table = 'phones';
    protected $fillable = ['number', 'person_id'];
    protected $hidden = [];

}
