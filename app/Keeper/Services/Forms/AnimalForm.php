<?php
namespace Keeper\Services\Forms;


class AnimalForm extends AbstractForm
{

    /**
     * No need to set any rules right now.
     *
     * @var array
     */

    protected $rules = array(
        'type' => 'required',
        'name' => 'required',
        'age' => 'required',
        'sex' => 'required',
        'vaccination' => 'required',
        'amount' => 'required',
        'date' => 'required'

    );
}