<?php

 

namespace App\Keeper\Services\Forms;


class AccountForm extends AbstractForm
{

    protected $rules = array(
        'account_name' => 'required|min:3',
        'description' => 'required|min:5',
        'balance' => 'required|numeric'
    );

}