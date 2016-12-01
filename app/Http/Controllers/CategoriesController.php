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
}
