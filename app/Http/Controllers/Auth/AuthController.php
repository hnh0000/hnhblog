<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Plugs\Auth\Qq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->only(['login', 'info']);
    }

    // 登录页面
    public function login(Qq $qq, $type = 'qq')
    {
        // 由于开发环境，不方便第三方登录，所以直接登录第一个账号
        if (config('app.env') == 'local') {
            Auth::loginUsingId(1);
            return view('auth.succeed');
        }

        $type == 'qq' ? $qq->qqLogin() : '';
    }

    /**
     * 用户授权登录后，登录
     * @param Request $request
     * @param User $user
     * @param string $type
     */
    public function info(Request $request, Qq $qq, User $user, $type = 'qq')
    {
        // csrf 验证
        abort_if($request->state !== \session()->token(), 403);
        \session()->regenerateToken();

        // 获取open_id,获取用户信息
        $open_id = $qq->openId();
        $data['name'] = $qq->name();
        $data['avatar'] = $qq->avatar();
        $data['sex'] = $qq->sex();

        // 登录账号
        $user->login($open_id, $data);

        return view('auth.succeed');
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('message', '已成功退出');
    }
}
