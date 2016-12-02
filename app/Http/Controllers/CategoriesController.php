<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function renderCatList(){
        $tasks_count = Task::all()->count();
        $categories = Category::all();
        return view('categoryList')
            ->withCategories($categories)
            ->withTasks_count($tasks_count);
    }

    public function create(Request $request){
        $category = new Category($request->all());
        $category->save();
        return;
    }

    public function destroy(Request $request){
        $categoryId = $request->get('categoryId');
        Category::find($categoryId)->delete();
    }
}
