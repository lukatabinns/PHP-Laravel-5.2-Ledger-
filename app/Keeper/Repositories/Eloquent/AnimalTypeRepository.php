<?php

namespace App\Keeper\Repositories\Eloquent;

use App\Keeper\AnimalType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Keeper\Repositories\AnimalTypeRepositoryInterface;
use App\Keeper\Exception\AnimalTypeNotFoundException;
use App\Keeper\Services\Forms\AnimalTypeForm;


class AnimalTypeRepository extends AbstractRepository implements AnimalTypeRepositoryInterface
{


    /**
     * Create a new DBCategoryRepository instance
     *
     * @param \Keeper\Category $category
     */
    public function __construct(AnimalType $animalType)
    {
        $this->model = $animalType;
    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        $animalType = $this->model->lists('name', 'id');
        return $animalType;
    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        $animalType = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $animalType;
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

        $animalType = $this->getNew();
        $animalType->name = $data['name'];
        $animalType->save();

        return $animalType;
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
        $animalType = $this->findById($id);
        $animalType->name = $data['name'];
        $animalType->save();
        return $animalType;

    }

    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $animalType = $this->findById($id);
        $animalType->delete();
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
        return new AnimalTypeForm;
    }
}    
