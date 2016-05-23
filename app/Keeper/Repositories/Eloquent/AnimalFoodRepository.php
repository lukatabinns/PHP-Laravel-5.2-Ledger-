<?php
namespace Keeper\Repositories\Eloquent;

use Keeper\AnimalFood;
use Keeper\Repositories\AnimalRepositoryInterface;

class AnimalFoodRepository extends AbstractRepository implements AnimalFoodRepositoryInterface
{


    public function __construct(AnimalFood $animalFood)
    {
        $this->model = $animalFood;

    }

    public function create(array $data)
    {
        $animalFood = $this->getNew();
        $animalFood->type = $data['type'];
        $animalFood->brand = $data['brand'];
        $animalFood->expiry_date = $data['expiry_date'];
        $animalFood->amount = $data['amount'];
        $animalFood->date_bought = $data['date_bought'];
      

    }

    public function getAll()
    {

    }

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        return $this->model->orderBy($orderColumn, $orderDir)->paginate(10);
    }
}    