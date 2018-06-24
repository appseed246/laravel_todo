<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InputRequest;
use App\Task;

class IndexController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    /**
     * タスク登録画面
     */
    public function input()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('user.input', [
            'tasks' => $tasks
        ]);
    }

    /**
     * 確認画面
     */
    public function confirm(InputRequest $request)
    {
        session([
            "name" => $request->name,
            "content" => $request->content,
            "limit" => $request->limit
        ]);
        return view('user.confirm', ['request' => $request]);
    }

    /**
     * タスクの登録
     * タスク登録成功後に完了画面を表示
     */
    public function commit(Request $request)
    {
        $data = $request->session()->all();

        $task = new Task;
        $task->name = $data['name'];
        //$task->user_id = "XXXX";
        $task->content = $data['content'];
        $task->limit = $data['limit'];

        // 登録エラー時にメッセージ表示
        try {
            $task->save();
        } catch (\PDOException $e) {
            return redirect()
                ->route('user.input')
                ->with([
                    'status' => "エラーが発生しました。"
                ]);
        }
        
        // セッションの破棄
        $request->session()->flush();

        // 登録完了時にTOPに戻る
        return redirect()
            ->route('user.input')
            ->with('status', '登録が完了しました。');
    }
}
