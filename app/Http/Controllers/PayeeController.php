<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Keeper\Repositories\PayeeRepositoryInterface;

class PayeeController extends Controller
{
    //
        /**
     * Payee Repository
     * @var /Keeper/Repositories/PayeeRepositoryInterface
     */

    protected $payees;

    /**
     * @param PayeeRepositoryInterface $payees
     */

    public function __construct(PayeeRepositoryInterface $payees)
    {
        $this->payees = $payees;
    }


    /**
     * Display a listing of the resource.
     * GET /payee
     *
     * @return Response
     */
    public function index()
    {
        $payees = $this->payees->findAll();
        return view('payee.index')->with('payees', $payees);
    }


    /**
     * Store a newly created resource in storage.
     * POST /payee
     *
     * @return Response
     */
    public function store()
    {

        $form = $this->payees->getForm();
        if (!$form->isValid()) {
            return redirect('payees.index')->withErrors($form->getErrors())->withInput();
        }
        $this->payees->create($form->getInputData());
        return redirect('payee/index');

    }


    /**
     * Show the form for editing the specified resource.
     * GET /payee/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $payee = $this->payees->findById($id);
        return view('payee/edit')->with('payee', $payee);
    }

    /**
     * Update the specified resource in storage.
     * PUT /payee/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $form = $this->payees->getForm();
        if (!$form->isValid()) {
            return redirect('payee/index')->withErrors($form->getErrors())->withInput();
        }
        $this->payees->update($id, $form->getInputData());
        return redirect('payee/index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /payee/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->payees->delete($id);
        return redirect('payee/index');
    }
}
