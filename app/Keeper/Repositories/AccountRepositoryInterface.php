<?php

namespace App\Keeper\Repositories;


interface AccountRepositoryInterface extends BaseRepositoryInterface
{
	//public function __construct();
    public function getTotalAccountBalance();
}