<?php

namespace App\Keeper\Repositories\Eloquent;

use App\Keeper\Payee;
use App\Keeper\Repositories\PayeeRepositoryInterface;
use App\Keeper\Services\Forms\PayeeForm;

class PayeeRepository extends AbstractRepository implements PayeeRepositoryInterface
{

    /**
     * Create a new DBPayeeRepository instance
     * @param \Keeper\Payee $payee
     */

    public function __construct(Payee $payee)
    {
        $this->model = $payee;

    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        return $this->model->lists('name', 'id');

    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        $payees = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $payees;

    }

    /**
     * Find a payee by id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new payee in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $payee = $this->getNew();
        $payee->name = $data['name'];
        $payee->save();
        return $payee;
    }

    /**
     * Update the specific payee in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $payee = $this->findById($id);
        $payee->name = $data['name'];
        $payee->save();
        return $payee;
    }

    /**
     * Delete the specific payee from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $payee = $this->findById($id);
        $payee->delete();
    }


    /**
     * Get the payee create/update form service
     *
     * @return \Keeper\Services\Forms\PayeeForm
     */

    public function getForm()
    {
        return new PayeeForm();
    }
}