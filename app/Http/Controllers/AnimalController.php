<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Animal;
use App\AnimalType;
use Illuminate\Support\Facades\Input;
use App\Keeper\Repositories\AnimalRepositoryInterface;
use Validator;

class AnimalController extends Controller
{
    protected $animal;

    public function __construct(AnimalRepositoryInterface $animal)
    {
        //parent::__construct();
        $this->animal = $animal;

    }

    /**
     * Display a listing of the resource.
     * GET /transaction
     *
     * @return Response
     */
    public function index()
    {
        $animals = Animal::orderBy('id', 'DESC')->paginate(5);
        return view('animal.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     * GET /transaction/create
     *
     * @return Response
     */
    public function create()
    {
        $animalTypes = array();
        foreach (AnimalType::all() as $animalType) {
            $animalTypes[$animalType->name] = $animalType->name;
        }

        $previousTypes = Animal::paginate(10);

        return view('animal.create')
            ->with('animalTypes', $animalTypes)
            ->with('previousTypes', $previousTypes);
         
    }

    /**
     * Store a newly created resource in storage.
     * POST /transaction
     *
     * @return Response
     */
    public function store()
    {
        $animalType = Input::get('animaltype');

        if ($animalType == 'default') {

            return redirect()->back()->withErrors('Select an animal type first');

    	
        } else {
            $input = Input::all();
            $validator = Validator::make($input, Animal::$rules);

            if ($validator->passes()) {
                $animal = new Animal();
                $animalType = AnimalType::where('name', '=', Input::get('animaltype'))->first();
                $animal->type = Input::get('animaltype');
                $animal->name = Input::get('name');
                $animal->age = Input::get('age');
                $animal->sex = Input::get('sex');
                $animal->vaccination = Input::get('vaccination');
                $animal->amount = Input::get('amount');
                $animal->date = Input::get('date');
                $animal->save();
         
                $animal->balance += Input::get('amount');
               
                $animal->save();
                return redirect('animal/index');
            }
        }

        return redirect()->back()->withErrors($validator);
    }

     public function balance()
    {
        $balance = $this->animal->findAll();
        $sum = $this->animal->getTotalAccountBalance();
        return view('animal.animal-balance')->with('balance', $balance)->with('sum', $sum);
    }

    public function postEditBalance() {
	    //get student id whose marks are to be updated
	    $animalId = Input::get('pk');
	    //get the new marks
	    $newAmount = Input::get('value');
	    //get the Student Data Row to be updated with new marks
	    $amountData = Animal::whereId($animalId)->first();
	    $amountData->balance = $newAmount;
	    if($amountData->save()) 
	        return Response::json(array('status'=>1));
	    else 
	        return Response::json(array('status'=>0));
	}
    /**
     * Display the specified resource.
     * GET /transaction/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /transaction/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function editAnimal($id)
    {
        //
        $animal = $this->animal->findById($id);
        return view('animalfood.edit-animal-food-type')->with('animalFoodType', $animalFoodType);
    }

    /**
     * Update the specified resource in storage.
     * PUT /transaction/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /transaction/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
