<?php

/**
 * 管理画面のコントローラ
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * ログイン情報入力ページ
     */
    public function index()
    {
        return view('auth');
    }

    /**
     * ログイン処理
     * @param LoginRequest
     */
    public function login()
    {
        return redirect('/admin/home');
    }
    /**
     * トップページ
     */
    public function home()
    {
        echo 'hello!';
    }
}
