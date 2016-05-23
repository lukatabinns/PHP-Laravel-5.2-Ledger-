<?php


namespace App\Keeper\Repositories;


interface AnimalFoodRepositoryInterface
{

    public function getAll();

    public function create(array $data);

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc');
}