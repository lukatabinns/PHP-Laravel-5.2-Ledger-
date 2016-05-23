<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Account;
use App\Payer;
use App\Category;
use App\Pmethod;
use App\transaction;
use Illuminate\Support\Facades\Input;
use Validator;
class ExpenseController extends Controller
{
    //
    public function createExpenses()
    {

        $accounts = array();
        foreach (Account::all() as $account) {
            $accounts[$account->account_name] = $account->account_name;
        }

        $payers = array();
        foreach (Payer::all() as $payer) {
            $payers[$payer->name] = $payer->name;
        }

        $incomeCategories = array();
        foreach (Category::where('type', '=', 'Expense')->get() as $income) {
            $incomeCategories[$income->name] = $income->name;
        }

        $methods = array();
        foreach (Pmethod::all() as $method) {
            $methods[$method->name] = $method->name;
        }


        $expenses = Transaction::where('type', '=', 'Expense')->paginate(10);

        return view('transaction.expense')
            ->with('accounts', $accounts)
            ->with('payers', $payers)
            ->with('incomes', $incomeCategories)
            ->with('methods', $methods)
            ->with('expenses', $expenses);
    }

    /**
     * Store the expense to the database and balance account
     */
    public function storeExpense()
    {
        $accountName = Input::get('account');
        if ($accountName == 'default') {
            return Redirect::back()->withErrors('Select an account first');
        } else {
            $input = Input::all();
            $validator = Validator::make($input, Transaction::$rules);
            if ($validator->passes()) {
                $transaction = new Transaction();
                $account = Account::where('account_name', '=', Input::get('account'))->first();
                $transaction->account = Input::get('account');
                $transaction->type = 'Expense';
                $transaction->category = Input::get('category');
                $transaction->amount = Input::get('amount');
                $transaction->dr = Input::get('amount');
                $transaction->payer = Input::get('payer');
                $transaction->method = Input::get('method');
                $transaction->ref = Input::get('ref');
                $transaction->description = Input::get('description');
                $transaction->date = Input::get('date');
                $transaction->bal = $account->balance - Input::get('amount');

                $transaction->save();

                /**
                 * Let's update account.
                 */

                $account = Account::where('account_name', '=', Input::get('account'))->first();
                //dd($account->account_name);
                $account->balance -= Input::get('amount');
                //dd($account);
                $account->save();

                return redirect('transaction/index');
            }
        }
        return redirect()->back()->withErrors($validator);
    }
}
