<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function renderTaskList(Request $request){
        $categoryId = $request->get('categoryId');
        if ('*' == $categoryId) {
            $tasks = Task::all();
        } else {
            $tasks = Task::all()
                ->where('category_id', $categoryId);
        }
        return view('taskList')->withTasks($tasks);
    }

    public function destroy(Request $request){
        $taskId = $request->get('taskId');
        Task::find($taskId)->delete();
    }

    public function toggleStatus(Request $request){
        $taskId = $request->get('taskId');
        $task = Task::find($taskId);
        $task->checked = !$task->checked;
        $task->updated_at = date('Y-m-d H:i:s');
        $task->save();
//        $this->renderTaskList($request);
    }
}
