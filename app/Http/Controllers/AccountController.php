<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Keeper\Repositories\AccountRepositoryInterface;
use App\Account;
use DB;
class AccountController extends Controller
{
    //

  	
    protected $account;

    public function __construct(AccountRepositoryInterface $account)
    {
        //parent::__construct();
        $this->account = $account;

    }

    /**
     * Display a listing of the resource.
     * GET /account
     *
     * @return Response
     */
    public function index()
    {
        $accounts = Account::orderBy('created_at', 'desc')->paginate(5);
        return view('account.index')->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     * GET /account/create
     *
     * @return Response
     */
    public function create()
    {
        return view('account.account-create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /account
     *
     * @return Response
     */
    public function store()
    {
        $form = $this->account->getForm();
        if (!$form->isValid()) {
            return redirect('transaction/index')->withErrors($form->getErrors())->withInput();
        }
        $this->account->create($form->getInputData());
        return redirect('transaction/index');
    }


    /**
     * Show the form for editing the specified resource.
     * GET /account/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $account = $this->account->findById($id);
        return view('account/account-edit')->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     * PUT /account/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $form = $this->account->getForm();
        if (!$form->isValid()) {
            return redirect('transaction/index')->withErrors($form->getErrors())->withInput();
        }
        $this->account->update($id, $form->getInputData());
        return redirect('transaction/index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /account/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->account->delete($id);
        return redirect('account/index');
    }


    /**
     * Get total available balance over all accounts
     */

    public function balance()
    {
        $balance = $this->account->findAll();
        $sum = $this->account->getTotalAccountBalance();
        return view('account.account-balance')->with('balance', $balance)->with('sum', $sum);
    }
}
