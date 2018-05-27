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

    public function res()
    {
        $input = Input::all();

        $rules = [
            'name' => 'require',
            'todo' => 'require',
        ];

        $messages = [
            'name.require' => '名前を入力してください。',
            'todo.require' => '内容を入力してください。',
        ];

        $validation = Validator::make($input, $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        return view('input');
    }
}
