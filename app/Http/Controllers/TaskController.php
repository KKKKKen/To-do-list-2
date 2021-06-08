<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use CreateTasksTable;

use Illuminate\Http\Request;


use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
    //
    public function index(int $id)
    {
        $folders = Folder::all();

        $current_folder = Folder::find($id);

        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            // 'current_folder_id'=> $id,　はなぜダメなのか
            'current_folder_id'=> $current_folder->id,
            'tasks' =>$tasks,
        ]);
    }

    public function create(int $id)
    {
        return view('tasks.create',[
            'folder_id' => $id,
        ]);
    }

 

    // 一旦Cに

    public function store(CreateTask $request, int $id, Task $task)
    {
        // 選択中のフォルダ
        $current_folder = Folder::find($id);

        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);


        // $current_folder->tasks()->save();

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);
    }
}
