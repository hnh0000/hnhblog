<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    public $timestamps = false;

    /**
     * 获取文章
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
