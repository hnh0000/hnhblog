<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{

    // 模型 「启动」 方法
    protected static function boot()
    {
        parent::boot();

        // 全局作用域，默认只会查询到显示的文章
        static::addGlobalScope('show', function(Builder $builder) {
            $builder->where('show', true);
        });
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

}
