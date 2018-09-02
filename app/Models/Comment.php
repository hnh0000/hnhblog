<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{

    // 不能被填充的字段
    protected $guarded = [];

    // 当前登录用户
    public function isLike($small = false)
    {
        if (false === $small) {
            return $this->likes->contains('user_id', Auth::id());
        } else {
            return $this->likes()->where('user_id',Auth::id())->first() ? true : false;
        }
    }

    // 多态关联获取评论的赞
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // 绝对链接
    public function link()
    {
        return route('articles.show', $this->article_id);
    }

    // 多对一关联文章表, 获取评论文章
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // 多对一关联用户表，获取评论者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 多对一关联用户表,获取回复对象
    public function rUser()
    {
        return $this->belongsTo(User::class, 'r_id');
    }

    // 一对多关联评论表，获取子评论
    public function childs()
    {
        return $this->hasMany(Comment::class,'p_id');
    }

}
