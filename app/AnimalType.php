<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    //
    protected $table = 'animaltypes';
    protected $fillable = array('type');
    public static $rules = array(
        'type' => 'required'
    );
}
