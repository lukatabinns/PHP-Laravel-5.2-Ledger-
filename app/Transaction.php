<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    //protected $table = 'transactions';

    protected $fillable = array('date','amount','description', 'method', 'account');

    protected $guarded = [];

    public static $rules = array(
        'date' => 'required',
        'amount' => 'required|numeric',
        'description' => 'required',
        'method' => 'required',
        'account' => 'required'
    );
}
