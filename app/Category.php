<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
   // protected $table = 'categories';
    protected $fillable = array('name');
    public static $rules = array(
        'name' => 'required'
    );
}
