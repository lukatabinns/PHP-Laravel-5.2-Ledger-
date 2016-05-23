<?php

namespace App\Keeper\Repositories\Eloquent;

use App\Keeper\Animal;
use App\Keeper\Repositories\AnimalRepositoryInterface;

class AnimalRepository extends AbstractRepository implements AnimalRepositoryInterface
{


    public function __construct(Animal $animal)
    {
        $this->model = $animal;

    }

    public function create(array $data)
    {
        $animal = $this->getNew();
        $animal->type = $data['type'];
        $animal->name = $data['name'];
        $animal->age = $data['age'];
        $animal->sex = $data['sex'];
        $animal->vaccination = $data['vaccination'];
        $animal->amount = $data['amount'];
        $animal->date = $data['date'];

    }

    public function getAll()
    {

    }

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        return $this->model->orderBy($orderColumn, $orderDir)->paginate(10);
    }

    public function getTotalAccountBalance()
    {
        $animals = $this->model->all();
        $res = 0;
        foreach ($animals as $animal) {
            $res += $animal->balance;
        }
        return $res;
    }
}