<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use CreateTasksTable;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


use App\Http\Requests\CreateTask;
use App\Http\Requests\UpdateTask;

use Illuminate\Support\Facades\App;
class TaskController extends Controller
{
    //
    public function index(int $id)
    {
        // ユーザーが１人で使う場合↓
        // $folders = Folder::all();

        // ユーザーが複数の場合はuserからフォルダを取ってくる
        $folders = Auth::user()->folders()->get();
        // $folders = Auth::user()->folders();
        

        // $current_folder = Folder::find($id);
        // ↑オリジナル
        $current_folder = $folders->find($id);

        if(is_null($current_folder)) {
            abort(404);
        }

        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            // 'current_folder_id'=> $id,はなぜダメなのか
            'current_folder_id'=> $id,
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

    public function edit(Int $id, Int $task_id)
    {
        $task = Task::find($task_id);
        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function update(int $id, Int $task_id, UpdateTask $request)
    {
        $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);

    }

    

}
