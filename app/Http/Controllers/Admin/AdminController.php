<?php

/**
 * 管理画面のコントローラ
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class AdminController extends Controller
{
    /**
     * ログイン情報入力ページ
     */
    public function index()
    {
        return view('common.auth', ['route_name' => 'admin.login']);
    }

    /**
     * ログイン処理
     * @param $request LoginRequest
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request->id, 'password' => $request->password])) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('status', "IDかパスワードが間違っています");
    }
    /**
     * トップページ
     */
    public function home()
    {
        echo 'hello!';
    }
}
