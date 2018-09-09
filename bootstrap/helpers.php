<?php
/**
 * Created by hnh.
 * Date: 2018/4/21
 * Time: 21:35
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
/**
 * 以-切割路由昵称，方便设置不同页面的样式
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 获取配置信息
 * @param string $key
 * @param null $default
 * @return null
 */
function setting(string $key, $default = null)
{
    if (!defined('SETTINGS')) {
        $data = \App\Models\Config::pluck('value', 'key');
        define('SETTINGS', $data);
    }
    $data = json_decode(SETTINGS,true);
    return isset($data[$key]) ? $data[$key] : $default;
}

// 判断是否为手机端
function is_mobile()
{
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $is_pc = (strpos($agent, 'windows nt')) ? true : false;
    $is_mac = (strpos($agent, 'mac os')) ? true : false;
    $is_iphone = (strpos($agent, 'iphone')) ? true : false;
    $is_android = (strpos($agent, 'android')) ? true : false;
    $is_ipad = (strpos($agent, 'ipad')) ? true : false;

    if($is_iphone){
        return  true;
    }
    if($is_android){
        return  true;
    }
    if($is_ipad){
        return  true;
    }
    if($is_pc){
        return  false;
    }
    if($is_mac){
        return  false;
    }
}