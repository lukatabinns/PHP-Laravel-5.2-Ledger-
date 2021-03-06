<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Account;
use App\Transaction;
use DateTime;
use DB;


class AuthenticateController extends Controller
{
    //
	public function getDash()
    {
    	$accounts = Account::paginate(5);

        $currentDate = new DateTime();
        $date = $currentDate->format('Y-m-d');
        $expenses = Transaction::where('type', '=', 'Expense')->where('date', '=', $date)->get();
        $incomes = Transaction::where('type', '=', 'Income')->where('date', '=', $date)->get();


        $incomes_this_month = Transaction::where(DB::raw('MONTH(created_at)'), '=', date('n'))
            ->where('type', '=', 'Income')->get();

        $expenses_this_month = Transaction::where(DB::raw('MONTH(created_at)'), '=', date('n'))
            ->where('type', '=', 'Expense')->get();

        $monthly_income = 0;
        foreach ($incomes_this_month as $income_this_month) {
            $monthly_income += $income_this_month->amount;
        }


        $monthly_expense = 0;
        foreach ($expenses_this_month as $expense_this_month) {
            $monthly_expense += $expense_this_month->amount;
        }

        $expense_today = 0;
        $income_today = 0;
        foreach ($expenses as $expense) {
            $expense_today += $expense->amount;
        }


        foreach ($incomes as $income) {
            $income_today += $income->amount;
        }
        return view('admin/admin-dash')
        	->with('accounts', $accounts)
            ->with('expense_today', $expense_today)
            ->with('income_today', $income_today)
            ->with('monthly_expense', $monthly_expense)
            ->with('monthly_income', $monthly_income);
    }
}
