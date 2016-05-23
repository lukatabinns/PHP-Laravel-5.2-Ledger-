<?php

namespace App\Keeper\Repositories\Eloquent;

use App\Keeper\AnimalFoodType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Keeper\Repositories\AnimalFoodTypeRepositoryInterface;
use App\Keeper\Exception\AnimalFoodTypeNotFoundException;
use App\Keeper\Services\Forms\AnimalFoodTypeForm;


class AnimalFoodTypeRepository extends AbstractRepository implements AnimalFoodTypeRepositoryInterface
{


    /**
     * Create a new DBCategoryRepository instance
     *
     * @param \Keeper\Category $category
     */
    public function __construct(AnimalFoodType $animalFoodType)
    {
        $this->model = $animalFoodType;
    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        $animalFoodType = $this->model->lists('name', 'id');
        return $animalFoodType;
    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        $animalFoodType = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $animalFoodType;
    }

    /**
     * Find a category by id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new category in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {

        $animalFoodType = $this->getNew();
        $animalFoodType->name = $data['name'];
        $animalFoodType->save();

        return $animalFoodType;
    }

    /**
     * Update the specific category in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $animalFoodType = $this->findById($id);
        $animalFoodType->name = $data['name'];
        $animalFoodType->save();
        return $animalFoodType;

    }

    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $animalFoodType = $this->findById($id);
        $animalFoodType->delete();
    }


    /**
     * Return all the expenses
     *
     * @param string $type
     * @return mixed
     */
    public function findAllTypes($type = 'name')
    {
        return $this->model->where('name', '=', $type)->get();

    }

    /**
     * Get the category create/update form service
     *
     * @return \Keeper\Services\Forms\CategoryForm
     */
    public function getForm()
    {
        return new AnimalFoodTypeForm;
    }
} 