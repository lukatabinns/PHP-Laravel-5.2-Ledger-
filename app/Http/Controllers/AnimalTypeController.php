<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Keeper\Repositories\AnimalTypeRepositoryInterface;
use Session;


class AnimalTypeController extends Controller
{
    //
        //
      /**
     * Category repository
     *
     * @var \Keeper\Repositories\AnimalTypeRepositoryInterface
     */
    protected $animalTypes;


    /**
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(AnimalTypeRepositoryInterface $animalTypes)
    {
        //parent::__construct();
        $this->animalTypes = $animalTypes;
    }


    public function types()
    {
        $animalType = $this->animalTypes->findAll();
        return view('animal.animal-type')->with('animalType', $animalType);
    }

    /**
     * Handle the category creation
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAnimalType()
    {

        $form = $this->animalTypes->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $this->animalTypes->create($form->getInputData());

        return redirect()->back();
    }


    /**
     * Show the category edit form
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */

    public function editAnimalType($id)
    {
        $animalType = $this->animalTypes->findById($id);
        return view('animal.edit-animal-type')->with('animalType', $animalType);
    }

    /**
     * Handle the editing of the animalType
     *
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */


    public function updateAnimalType(Request $request, $id)
    {
        $animalType = $request->input('type');
        $form = $this->animalTypes->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $this->animalTypes->update($id, $form->getInputData());
        \Session::flash('message', 'Success!! animal type updated successfully'); 
        return redirect('animal/type');
    }


    /**
     * Delete a animalType from the database
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAnimalType($id)
    {
        $this->animalTypes->delete($id);
        return redirect()->back();
    }
}
