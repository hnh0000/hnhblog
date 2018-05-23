<?php
/**
 * Created by hnh.
 * Date: 2018/5/22
 * Time: 23:34
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as M;


class Model extends M
{

    /**
     * 排序
     * @param $query
     * @param $way
     * @return mixed
     */
    public function scopeOrder($query, $way=null)
    {
        switch ($way) {
            default:
                $query->newest();
                break;
        }
        return $query;
    }


    /**
     * 获取最新的,根据updated_at排序
     * @param $query
     * @return mixed
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc');
    }


}