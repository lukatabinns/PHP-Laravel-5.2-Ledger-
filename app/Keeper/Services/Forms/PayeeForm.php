<?php

namespace App\Keeper\Services\Forms;


class PayeeForm extends AbstractForm
{


    protected $rules = array(
        'name' => 'required|min:3'
    );
}