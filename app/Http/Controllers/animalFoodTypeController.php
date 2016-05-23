<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Keeper\Repositories\AnimalFoodTypeRepositoryInterface;
use Session;
class animalFoodTypeController extends Controller
{
    //
    //
        //
      /**
     * Category repository
     *
     * @var \Keeper\Repositories\AnimalTypeRepositoryInterface
     */
    protected $animalFoodTypes;


    /**
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(AnimalFoodTypeRepositoryInterface $animalFoodTypes)
    {
        //parent::__construct();
        $this->animalFoodTypes = $animalFoodTypes;
    }


    public function types()
    {
        $animalFoodType = $this->animalFoodTypes->findAll();
        return view('animalfood.animal-food-type')->with('animalFoodType', $animalFoodType);
    }

    /**
     * Handle the category creation
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAnimalFoodType()
    {

        $form = $this->animalFoodTypes->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $this->animalFoodTypes->create($form->getInputData());

        return redirect()->back();
    }


    /**
     * Show the category edit form
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */

    public function editAnimalFoodType($id)
    {
        $animalFoodType = $this->animalFoodTypes->findById($id);
        return view('animalfood.edit-animal-food-type')->with('animalFoodType', $animalFoodType);
    }

    /**
     * Handle the editing of the category
     *
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */


    public function updateAnimalFoodType(Request $request, $id)
    {
        $animalFoodType = $request->input('type');
        $form = $this->animalFoodTypes->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $this->animalFoodTypes->update($id, $form->getInputData());
        \Session::flash('message', 'Success!! category updated successfully'); 
        return redirect('animalfood/type');
    }


    /**
     * Delete a category from the database
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAnimalFoodType($id)
    {
        $this->animalFoodTypes->delete($id);
        return redirect()->back();
    }
}
