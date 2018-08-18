<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['user_id'];

    /**
     * 获得拥有此点赞的模型
     */
    public function likeable()
    {
        return $this->morphTo();
    }
}
