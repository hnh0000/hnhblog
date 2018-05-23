<?php
/**
 * Created by hnh.
 * Date: 2018/5/23
 * Time: 17:42
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Plugs;

use Illuminate\Support\Facades\Auth;

class User
{

    public function logoutLink()
    {
        if (Auth::guard('admin')->check()) {
            return admin_asset(admin_base_path('auth/logout'));
        } else if (Auth::check()) {
            return '..';
        }
    }

}