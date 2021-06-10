<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $folder = $user->folders()->first();

        if(is_null($folder)){
            return view('home');
        }

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);

    }


}
