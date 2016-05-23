<?php
namespace Keeper\Services\Forms;


class AnimalFoodForm extends AbstractForm
{

    /**
     * No need to set any rules right now.
     *
     * @var array
     */

    protected $rules = array(
        'type' => 'required',
        'brand' => 'required',
        'expiry_date' => 'required',
        'amount' => 'required',
        'date_bought' => 'required'
     );
}