<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalFood extends Model
{
    //
    protected $table = 'animalfoods';
    protected $fillable = array('type','brand','expiry_date', 'amount', 'date_bought');

    protected $guarded = [];

    public static $rules = array(
    	//'type' => 'required',
    	'brand' => 'required',
    	'expiry_date' => 'required',
    	'amount' => 'required|numeric',
        'date_bought' => 'required'
     );
}
