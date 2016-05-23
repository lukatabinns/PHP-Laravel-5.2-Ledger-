<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Keeper\Repositories\CategoryRepositoryInterface;
use Session;

class CategoryController extends Controller
{
    //
      /**
     * Category repository
     *
     * @var \Keeper\Repositories\CategoryRepositoryInterface
     */
    protected $categories;


    /**
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        //parent::__construct();
        $this->categories = $categories;
    }


    public function expense()
    {
        $expenses = $this->categories->findAllExpenses();
        return view('categories.expense')->with('expenses', $expenses);
    }


    public function income()
    {
        $incomes = $this->categories->findAllIncomes();
        return view('categories.income')->with('incomes', $incomes);
    }


    /**
     * Handle the category creation
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCategory()
    {

        $form = $this->categories->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $this->categories->create($form->getInputData());

        return redirect()->back();
    }


    /**
     * Show the category edit form
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */

    public function editCategory($id)
    {
        $category = $this->categories->findById($id);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Handle the editing of the category
     *
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */


    public function updateCategory(Request $request, $id)
    {
        $categoryType = $request->input('type');
        $form = $this->categories->getForm();
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        if($categoryType == 'expense'){
            $this->categories->update($id, $form->getInputData());
            \Session::flash('message', 'Success!! category updated successfully'); 
            return redirect('expense');
        }elseif($categoryType == 'income'){
             $this->categories->update($id, $form->getInputData());
             \Session::flash('message', 'Success!! category updated successfully'); 
             return redirect('income');
        }
    }


    /**
     * Delete a category from the database
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $this->categories->delete($id);
        return redirect()->back();
    }
}
