<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'avatar', 'type'
    ];

    protected $hidden = [
        'open_id', 'remember_token',
    ];

    /**
     * 获取用户个人中心链接
     *
     * @return string
     */
    public function link()
    {
        return route('users.show', $this->id);
    }

    /**
     * 获取性别中文形式
     *
     * @return mixed
     */
    public function sex()
    {
        $sex = ['_0' => '男', '_1' => '女', '_2' => '未知'];
        return $sex[$this->sex];
    }

    // 是否为作者
    public function isAuthOf($modle)
    {
        return $modle->user_id === Auth::id();
    }

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

    // 一对多关联评论表
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // 一对多关联评论表,获取回复我的评论
    public function rMyComments()
    {
        return $this->hasMany(Comment::class,'r_id');
    }

    // 获得点赞过得话题
    public function likeArticles()
    {
        $article_ids = $this->hasMany(Like::class)->where('likeable_type','App\Models\Article')->pluck('likeable_id');
        $articles = Article::whereIn('id', $article_ids);

        return $articles;
    }
}
