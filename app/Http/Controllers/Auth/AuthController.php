<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->only(['login','info']);
    }

    // 登录页面
    public function login(User $user,Request $request, $type = 'qq')
    {
        $type == 'qq' ? $user->qqLogin() : '';
    }

    /**
     * 授权登录后，获取用户信息
     * @param Request $request
     * @param User $user
     * @param string $type
     */
    public function info(Request $request, User $user, $type = 'qq')
    {
        // csrf 验证
        abort_if($request->state !== \session()->token(), 403);
        \session()->regenerateToken();

        // 获取open_id
        $open_id = $user->openId();

        // 获取用户信息
        $info = $user->info();
        $data['name'] = $user->name();
        $data['avatar'] = $user->avatar();
        $data['sex'] = $user->sex();

        // 登录账号
        $user->login($open_id,$data);

        return view('auth.succeed');
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('message','已成功退出');
    }
}
