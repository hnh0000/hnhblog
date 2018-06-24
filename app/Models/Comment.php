<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // 不能被填充的字段
    protected $guarded = [];

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
