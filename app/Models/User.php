<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    // QQ登录类
    use \App\Models\User\Qq;

    protected $fillable = [
        'name', 'email', 'avatar', 'type'
    ];

    protected $hidden = [
        'open_id', 'remember_token',
    ];


    /**
     * 用户登录，如果用户不存在自动注册
     * @param string $open_id
     * @param array $info
     * @param string $source
     * @param bool $remember
     */
    public function login(string $open_id, array $info, string $source = '_0', bool $remember = true)
    {
        $user = User::where('open_id', $open_id)->where('source', $source)->first();
        if (!$user) {
            $this->name = $info['name'];
            $this->avatar = $info['avatar'];
            $this->sex = $info['sex'] == '男' ? '_0' : ($info['sex'] == '女' ? '_1' : '_2');
            $this->open_id = $open_id;
            $this->source = $source;
            $this->save();
            $user = $this;
        }
        Auth::login($user,$remember);
    }

}
