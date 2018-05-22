<?php
/**
 * Created by hnh.
 * Date: 2018/4/21
 * Time: 21:35
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */


/**
 * 以-切割路由昵称，方便设置不同页面的样式
 * @return mixed
 */
function route_class()
{
    return str_replace('.','-',Route::currentRouteName());
}

