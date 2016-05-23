<?php

namespace App\Keeper\Services\Forms;


class PaymentMethodForm extends AbstractForm
{
    protected $rules = array(
        'name' => 'required|min:3'
    );

}