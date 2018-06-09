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

    /**
     * 当前登录用户是否已经点赞
     *
     * @param bool $small
     * @return bool
     */
    public function isLike($small = false)
    {
        if(!Auth::check()){
            return false;
        }

        if (!$small) {
            return $this->likes->contains('user_id', Auth::id());
        } else {
            return $this->likes()->where('user_id',Auth::id())->first() ? true : false;
        }
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

    /**
     * 获得此模型的所有评论
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

}
