<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'account_name' => 'Bill',
            'description' => 'bought a British Shorthair cat and a Cocker Spaniel dog',
            'balance' => 173.56,
            'created_at' => Carbon::now(),
        ]);
    }
}
