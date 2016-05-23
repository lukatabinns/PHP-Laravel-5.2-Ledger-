<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pmethod extends Model
{
    //
   //protected $table = 'pmethods';
   protected $fillable = array('name');
   protected $guarded = [];

    public static $rules = array(
        'name' => 'required'
    );
}
