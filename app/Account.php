<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
   // protected $table = 'accounts';

    protected $fillable = array('account_name','description','balance');

    public static function getSum()
    {
        $accounts = Account::all();
        $res = 0;
        foreach ($accounts as $account) {
            $res += $account->balance;
        }
        return $res;
    }
}
