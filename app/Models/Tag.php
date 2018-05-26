<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    public $timestamps = false;


    // 多对多关联 Tags 表
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
