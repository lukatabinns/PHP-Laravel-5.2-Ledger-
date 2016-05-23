<?php

namespace App\Keeper\Repositories;

interface AnimalFoodTypeRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * Return all the incomes
     *
     * @param string $type
     * @return mixed
     */

    public function findAllTypes($type = 'name');
}