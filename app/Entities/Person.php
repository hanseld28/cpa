<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * Class Person.
 *
 * @package namespace App\Entities;
 */
class Person extends User implements Transformable
{
    use TransformableTrait;
    use Notifiable;
    use SoftDeletes;
    
    public $timestamps = true;
    protected $table = 'people';
    protected $fillable = ['name', 'registry', 'rg', 'cpf', 'birth', 'gender'];
    protected $hidden = [];

}
