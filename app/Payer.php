<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    //
    //protected $table = 'payer';
    protected $fillable = array('name');
    protected $guarded = [];
    public static $rules = array(
        'name' => 'required'
    );
}
