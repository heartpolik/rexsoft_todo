<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Returns list of tasks from one of categories
     * @param  int categoryId id of category
     * @return html
     */
    public function renderTaskList(Request $request){
        $categoryId = $request->get('categoryId');
        if (0 == $categoryId) {
            $tasks = Task::all();
        } else {
            $tasks = Task::all()
                ->where('category_id', $categoryId);
        }
        return view('taskList')->withTasks($tasks);
    }
    /**
     * Invert status of task
     * @param  int taskId id of task
     * @return ---
     */
    public function toggleStatus(Request $request){
        $taskId = $request->get('taskId');
        $task = Task::find($taskId);
        $task->checked = !$task->checked;
        $task->updated_at = date('Y-m-d H:i:s');
        $task->save();
    }

    public function create(Request $request){
        $task = new Task($request->all());
        $task->save();
    }

    public function edit(Request $request){
        $categories = Category::all();
        $task = Task::find($request->get('taskId'));
        return view('editTaskModal')
            ->withTask($task)
            ->withCategories($categories);
    }

    public function update(Request $request){
        $task = Task::find($request->get('taskId'));
//        hack to set default priority
        $task->priority = 0;
        $task->update($request->except('taskId'));
    }

    public function destroy(Request $request){
        $taskId = $request->get('taskId');
        Task::find($taskId)->delete();
    }
}
