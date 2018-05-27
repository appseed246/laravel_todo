<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;

class IndexController extends Controller
{
    public function input()
    {
        return view('input');
    }

    public function res(Request $request)
    {
        $name = $request->input('name');
        $todo = $request->input('todo');

        return view('input', compact('name', 'todo'));
    }
}
