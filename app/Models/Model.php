<?php
/**
 * Created by hnh.
 * Date: 2018/5/22
 * Time: 23:34
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Model extends Eloquent
{


    // 数据排序
    public function scopeOrder($query, $way=null)
    {
        switch ($way) {
            default:
                $query->newest();
                break;
        }
        return $query;
    }


    // Order默认排序规则,获取最新的，根据created_at排序
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc');
    }


}