<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InputRequest;
use App\Task;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * タスク登録画面
     */
    public function input()
    {
        $tasks = Task::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

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
            "input" => [
                "content" => $request->content,
                "limit" => $request->limit
            ],
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
        $task->user_id = Auth::user()->id;
        $task->content = $data['input']['content'];
        $task->limit = $data['input']['limit'];

        // 登録エラー時にメッセージ表示
        try {
            $task->save();
        } catch (\PDOException $e) {
            return redirect()
                ->route('user.home')
                ->with([
                    'status' => "エラーが発生しました。"
                ]);
        }
        
        // セッションの破棄
        $request->session()->forget('input');

        // 登録完了時にTOPに戻る
        return redirect()
            ->route('user.home')
            ->with('status', '登録が完了しました。');
    }
}
