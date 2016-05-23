<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::group(['middleware' => 'web'], function () {
	Route::get('auth/dash', 'AuthenticateController@getDash');
	Route::get('logout', [ 'as' => 'logout', 'uses' =>'Auth\AuthController@logout']);

	/*********************the accounts routes************************************/
	Route::get('account/index', ['as' => 'account_index', 'uses' => 'AccountController@index']);
	Route::get('account/balance', ['as' => 'account_balance', 'uses' => 'AccountController@balance']);
	Route::get('account/create', ['as' => 'account_create', 'uses' => 'AccountController@create']);
	Route::get('account/edit/{id}', ['as' => 'account_edit', 'uses' => 'AccountController@edit']);
	Route::post('account/update/{id}', ['as' => 'account_update', 'uses' => 'AccountController@update']);
	Route::post('account/store', ['as' => 'account_store', 'uses' => 'AccountController@store']);
	Route::get('account/destroy/{id}', ['as' => 'account_destroy', 'uses' => 'AccountController@destroy']);
	/*********************the end accounts routes************************************/

	/*********************the transactions routes************************************/
	Route::get('transaction/index', ['as' => 'transaction_index', 'uses' => 'TransactionController@index']);
	Route::post('transaction/store', ['as' => 'transaction_store', 'uses' => 'TransactionController@store']);
	Route::get('transaction/create', ['as' => 'transaction_create', 'uses' => 'TransactionController@create']);
    Route::get('expense/index', ['as' => 'expense_index', 'uses' => 'ExpenseController@createExpenses']);
    Route::post('expense/store', ['as' => 'store_expense', 'uses' => 'ExpenseController@storeExpense']);
	//Route::post('account/store', ['as' => 'account_store', 'uses' => 'TransactionController@store']);
	//Route::get('account/destroy', ['as' => 'account_destroy', 'uses' => 'AccountController@destroy']);
	/*********************the end transactions routes************************************/

		/*********************the catergories routes************************************/
  	Route::get('expense', array('as' => 'expense_category', 'uses' => 'CategoryController@expense'));
    Route::get('income', array('as' => 'income_category', 'uses' => 'CategoryController@income'));
    Route::post('post/category', array('as' => 'post_category', 'uses' => 'CategoryController@postCategory'));
    Route::get('edit/category/{id}', array('as' => 'edit_category', 'uses' => 'CategoryController@editCategory'))->where('id', '[1-9][0-1]*');
    Route::post('update/category/{id}', array('as' => 'update_category', 'uses' => 'CategoryController@updateCategory'))->where('id', '[1-9][0-1]*');
    Route::get('deleteCategory/{id}', array('as' => 'delete_category', 'uses' => 'CategoryController@deleteCategory'))->where('id', '[1-9][0-1]*');
	/*********************the end categories routes************************************/

	/****************************the payee routes************************************/
	Route::get('payee/index', ['as' => 'payee_index', 'uses' => 'PayeeController@index']);
	Route::get('payee/edit/{id}', ['as' => 'payee_edit', 'uses' => 'PayeeController@edit']);
	Route::post('payee/store', ['as' => 'payee_store', 'uses' => 'PayeeController@store']);
	Route::post('payee/update/{id}', ['as' => 'payee_update', 'uses' => 'PayeeController@update']);
	Route::get('payee/destroy/{id}', ['as' => 'payee_destroy', 'uses' => 'PayeeController@destroy']);
	/****************************the end payee routes************************************/

	/***************************the payer routes************************************/
	Route::get('payer/index', ['as' => 'payer_index', 'uses' => 'PayerController@index']);
	Route::get('payer/edit/{id}', ['as' => 'payer_edit', 'uses' => 'PayerController@edit']);
	Route::post('payer/store', ['as' => 'payer_store', 'uses' => 'PayerController@store']);
	Route::post('payer/update/{id}', ['as' => 'payer_update', 'uses' => 'PayerController@update']);
	Route::get('payer/destroy/{id}', ['as' => 'payer_destroy', 'uses' => 'PayerController@destroy']);
	/***************************the end payer routes************************************/

	/***************************the paymethod routes************************************/
	Route::get('paymethod/index', ['as' => 'paymethod_index', 'uses' => 'PaymethodController@index']);
	Route::get('paymethod/edit/{id}', ['as' => 'paymethod_edit', 'uses' => 'PaymethodController@edit']);
	Route::post('paymethod/store', ['as' => 'paymethod_store', 'uses' => 'PaymethodController@store']);
	Route::post('paymethod/update/{id}', ['as' => 'paymethod_update', 'uses' => 'PaymethodController@update']);
	Route::get('paymethod/destroy/{id}', ['as' => 'paymethod_destroy', 'uses' => 'PaymethodController@destroy']);
	/***************************the end paymethod routes************************************/

	/***************************the animal routes************************************/
	Route::get('animal/index', ['as' => 'animal_index', 'uses' => 'AnimalController@index']);
	Route::post('animal/store', ['as' => 'animal_store', 'uses' => 'AnimalController@store']);
	Route::get('animal/create', ['as' => 'animal_create', 'uses' => 'AnimalController@create']);
	Route::get('animal/edit/{id}', ['as' => 'animal_edit', 'uses' => 'AnimalController@editAnimal']);
	Route::post('animal/postedit', ['as' => 'animalpost_edit', 'uses' => 'AnimalController@postEditBalance']);
	Route::get('animal/balance', ['as' => 'animal_balance', 'uses' => 'AnimalController@balance']);
  	Route::get('animal/type', 	['as' => 'animal_type', 'uses' => 'AnimalTypeController@types']);
  	Route::get('animaltype/edit/{id}', ['as' => 'animaltype_edit', 'uses' => 'AnimalTypeController@editAnimalType']);
    Route::post('animaltype/update/{id}', ['as' => 'animaltype_update', 'uses' => 'AnimalTypeController@updateAnimalType']);
    Route::post('post/animaltype', ['as' => 'post_animaltype', 'uses' => 'AnimalTypeController@postAnimalType']);
	Route::get('destroy/animaltype/{id}', ['as' => 'destroy_animaltype', 'uses' => 'AnimalTypeController@deleteAnimalType']);
   	/***************************the animal routes************************************/

   	/***************************the animal food routes************************************/
	Route::get('animalfood/index', ['as' => 'animalfood_index', 'uses' => 'AnimalFoodController@index']);
	Route::post('animalfood/store', ['as' => 'animalfood_store', 'uses' => 'AnimalFoodController@store']);
	Route::get('animalfood/create', ['as' => 'animalfood_create', 'uses' => 'AnimalFoodController@create']);
  	Route::get('animalfood/type', 	['as' => 'animalfood_type', 'uses' => 'AnimalFoodTypeController@types']);
  	Route::get('animalFoodtype/edit/{id}', ['as' => 'animalfoodtype_edit', 'uses' => 'AnimalFoodTypeController@editAnimalFoodType']);
    Route::post('animalfoodtype/update/{id}', ['as' => 'animalfoodtype_update', 'uses' => 'AnimalFoodTypeController@updateAnimalFoodType']);
    Route::post('post/animalfoodtype', ['as' => 'post_animalfoodtype', 'uses' => 'AnimalFoodTypeController@postAnimalFoodType']);
	Route::get('destroy/animalfoodtype/{id}', ['as' => 'destroy_animalfoodtype', 'uses' => 'AnimalFoodTypeController@deleteAnimalFoodType']);
   	/***************************the animal food routes************************************/
});