<?php

namespace Keeper\Services\Forms;


class TransactionForm extends AbstractForm
{

    /**
     * No need to set any rules right now.
     *
     * @var array
     */

    protected $rules = array(
        'account' => 'required',
        'type' => 'required',
        'category' => 'required',
        'amount' => 'required',
        'payer' => 'required',
        'payee' => 'required',
        'method' => 'required',
        'ref' => 'required',
        'description' => 'required'
    );
}