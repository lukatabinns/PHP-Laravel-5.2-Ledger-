<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AnimalFood;
use App\AnimalFoodType;
use Illuminate\Support\Facades\Input;
use Validator;
class animalFoodController extends Controller
{
    //
    //
     //
    /**
     * Display a listing of the resource.
     * GET /transaction
     *
     * @return Response
     */
    public function index()
    {
        $animalFoods = AnimalFood::orderBy('id', 'DESC')->paginate(5);
        return view('animalfood.index')->with('animalFoods', $animalFoods);
    }

    /**
     * Show the form for creating a new resource.
     * GET /transaction/create
     *
     * @return Response
     */
    public function create()
    {
        $animalFoodTypes = array();
        foreach (AnimalFoodType::all() as $animalFoodType) {
            $animalFoodTypes[$animalFoodType->name] = $animalFoodType->name;
        }

        $previousFoodTypes = AnimalFood::paginate(10);

        return view('animalfood.create')
            ->with('animalFoodTypes', $animalFoodTypes)
            ->with('previousFoodTypes', $previousFoodTypes);
         
    }

    /**
     * Store a newly created resource in storage.
     * POST /transaction
     *
     * @return Response
     */
    public function store()
    {
        $animalFoodType = Input::get('animalfoodtype');

        if ($animalFoodType == 'default') {

            return redirect()->back()->withErrors('Select an animal type first');

    	
        } else {
            $input = Input::all();
            $validator = Validator::make($input, AnimalFood::$rules);

            if ($validator->passes()) {
                $animalFood = new AnimalFood();
                $animalFoodType = AnimalFoodType::where('name', '=', Input::get('animalfoodtype'))->first();
                $animalFood->type = Input::get('animalfoodtype');
                $animalFood->brand = Input::get('brand');
                $animalFood->expiry_date = Input::get('expiry_date');
                $animalFood->amount = Input::get('amount');
                $animalFood->date_bought = Input::get('date_bought');
                $animalFood->save();
         
                $animalFood->balance += Input::get('amount');
               
                $animalFood->save();
                return redirect('animalfood/index');
            }
        }

        return redirect()->back()->withErrors($validator);
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
    public function edit($id)
    {
        //
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
