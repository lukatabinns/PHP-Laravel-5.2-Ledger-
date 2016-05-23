<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Keeper\Repositories\PayerRepositoryInterface;
use App\Payer;

class PayerController extends Controller
{
    //
        /**
     * Payer Repository
     * @var /Keeper/Repositories/PayerRepositoryInterface
     */
    protected $payers;


    public function __construct(PayerRepositoryInterface $payers)
    {
        $this->payers = $payers;
    }

    /**
     * Display a listing of the resource.
     * GET /payer
     *
     * @return Response
     */
    public function index()
    {
        $payers = $this->payers->findAll();
        return view('payer.index')->with('payers', $payers);
    }


    /**
     * Store a newly created resource in storage.
     * POST /payer
     *
     * @return Response
     */
    public function store()
    {
        $form = $this->payers->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('payer/index')->withErrors($form->getErrors())->withInput();
        }
        $this->payers->create($form->getInputData());
        return redirect('payer/index');
    }

    /**
     * Show the form for editing the specified resource.
     * GET /payer/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $payer = $this->payers->findById($id);
        return view('payer/edit')->with('payer', $payer);
    }

    /**
     * Update the specified resource in storage.
     * PUT /payer/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $form = $this->payers->getForm();
        if (!$form->isValid()) {
            return redirect('payer/index')->withErrors($form->getErrors())->withInput();
        }
        $this->payers->update($id, $form->getInputData());
        return redirect('payer/index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /payer/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->payers->delete($id);
        return redirect('payer/index');
    }
}
