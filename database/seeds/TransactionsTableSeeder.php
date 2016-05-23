<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('transactions')->insert([
            'account' => 'Bill',
            'type' => 'income',
            'category' => 'animals',
			'amount' => 173.56,
			'payer' => 'Bill Grayham',
			'payee' => '',
			'method' => 'debit card',
			'ref' => '123450',
			'status' => 'Cleared',
			'description' => 'Bill Grayham purchased some animals. All expense paid',
			'tax' => 15.77,
			'dr' => 173.56,
			'cr' => 0,
			'bal' => 173.56, 
			'date' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
