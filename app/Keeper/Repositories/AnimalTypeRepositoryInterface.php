<?php

namespace App\Keeper\Repositories;

interface AnimalTypeRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * Return all the incomes
     *
     * @param string $type
     * @return mixed
     */

    public function findAllTypes($type = 'name');
}