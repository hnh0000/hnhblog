<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{

    // 关闭自动维护
    public $timestamps = false;

    // 模型 「启动」 方法
    protected static function boot()
    {
        parent::boot();

        // 全局作用域，默认只会查询到显示的文章
        static::addGlobalScope('show', function (Builder $builder) {
            $builder->where('show', true);
        });
    }

    // 获取链接
    public function link()
    {
        return route('articles.show',$this->id);
    }

    // 一对多获取文章评论
    public function comments($kind='all')
    {
        $model = $this->hasMany(Comment::class);

        // 只获取顶级评论
        if ($kind=='p') {
            $model->where('p_id',0);
        }

        // 只获取子评论
        if ($kind=='c') {
            $model->where('p_id','!=',0);
        }

        return $model;
    }

    // 多对多关联 标签表
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // 反向一对关联 分类表
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 当前模型用户是否已点赞
    public function isLike($small = false)
    {
        if (false === $small) {
            return $this->likes->contains('user_id', Auth::id());
        } else {
            return $this->likes()->where('user_id',Auth::id())->first() ? true : false;
        }
    }

    // 多态关联获取文章的赞
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
