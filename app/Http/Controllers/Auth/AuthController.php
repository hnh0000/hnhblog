<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    // 登录页面
    public function login(User $user,Request $request, $type = 'qq')
    {
        $type == 'qq' ? $user->qqLogin() : '';
    }

    // 登录成功后的回调，用来获取用户的信息
    public function info(Request $request, User $user, $type = 'qq')
    {
        // csrf 验证
        abort_if($request->state !== \session()->token(), 403);
        \session()->regenerateToken();

        // 获取open_id
        $open_id = $user->openId();

        // 获取用户信息
        $info = $user->info();

        dd($info);
    }


}
