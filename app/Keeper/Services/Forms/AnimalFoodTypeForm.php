<?php

namespace App\Keeper\Services\Forms;

class AnimalFoodTypeForm extends AbstractForm
{

    /**
     * The validation rules to validate the input data against
     *
     * @var array
     */

    protected $rules = array(
        'name' => 'required'
    );

}