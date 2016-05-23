<?php

namespace App\Keeper\Services\Forms;


class PayerForm extends AbstractForm
{
    protected $rules = array(
        'name' => 'required|min:3'
    );

}