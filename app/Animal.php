<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    //protected $table = 'animals';

    protected $fillable = array('type','name','age', 'sex', 'amount', 'vaccination', 'date');

    protected $guarded = [];

    public static $rules = array(
    	'name' => 'required',
    	'age' => 'required',
    	'sex' => 'required',
        'amount' => 'required|numeric',
        'vaccination' => 'required',
        'date' => 'required'
     );

    public static function getSum()
    {
        $animals = Animal::all();
        $res = 0;
        foreach ($animals as $animal) {
            $res += $animal->balance;
        }
        return $res;
    }
}
