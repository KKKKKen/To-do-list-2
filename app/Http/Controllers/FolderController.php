<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    //
    public function create()
    {
        return view('folders/create');
    }
    public function store(CreateFolder $request, Folder $folder)
    {
        // ↓だとどうなるか実験
        // $folder = Folder::all();

        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);

    }
}
