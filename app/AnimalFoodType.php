<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalFoodType extends Model
{
    //
    protected $table = 'animalfoodtypes';
    protected $fillable = array('type');
    public static $rules = array(
        'type' => 'required'
    );
}
