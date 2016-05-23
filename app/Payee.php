<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    //
   // protected $table = 'payees';
    protected $fillable = array('name');
    protected $guarded = [];

    public static $rules = array(
        'name' => 'required'
    );

}
