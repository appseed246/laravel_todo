<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InputRequest;

class IndexController extends Controller
{
    /**
     * タスク登録画面
     */
    public function input()
    {
        return view('input');
    }

    /**
     * 確認画面
     */
    public function confirm(InputRequest $request)
    {
        $request->flash();
        return view('confirm', ['input' => $request->all()]);
    }

    /**
     * タスクの登録
     * タスク登録成功後に完了画面を表示
     */
    public function commit(Request $request)
    {
        return redirect('form/input')->with('status', '登録が完了しました。');
    }
}
