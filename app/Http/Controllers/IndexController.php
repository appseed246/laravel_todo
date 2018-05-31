<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InputRequest;
use App\Task;

class IndexController extends Controller
{
    /**
     * タスク登録画面
     */
    public function input()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('input', [
            'tasks' => $tasks
        ]);
    }

    /**
     * 確認画面
     */
    public function confirm(InputRequest $request)
    {
        $request->flash();
        return view('confirm', ['request' => $request]);
    }

    /**
     * タスクの登録
     * タスク登録成功後に完了画面を表示
     */
    public function commit(Request $request)
    {
        // タスクの登録
        $task = new Task;
        $task->name = $request->name;
        $task->content = $request->content;
        $task->limit = $task->limit;

        // 登録エラー時にメッセージ表示
        try {
            $task->save();
        } catch(\PDOException $e) {
            return redirect('form/input')->with([
                'status' => "エラーが発生しました。"
            ]);
        }
        
        // 登録完了時にTOPに戻る
        return redirect('form/input')->with('status', '登録が完了しました。');
    }
}
