<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


//CDB127109EED9BE887B09B3D7E6A94EA   CEB3A1084CD054F5894E925B582453C2
//B60DD696EBAC014391E4E6E031D79EF7 B60DD696EBAC014391E4E6E031D79EF7
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

        // 获取open_id
        $access_tokens = $user->openId();
    }


}
