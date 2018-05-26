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

/**
 * 把数组或者字符串转成可以使用 json_encode 的数据形式
 * @param $expression
 * @param null $return
 * @return string
 */
function var_encode($expression, $return = null)
{
    if ($return) {

        if (is_string($expression)) {
            return $expression;
        }
        if (is_array($expression)) {
            return var_array($expression);
        }

    } else {
        if (is_string($expression)) {
            echo $expression;
        }
        if (is_array($expression)) {
            echo var_array($expression);
        }
    }

}


/**
 * 数组转成 ["k"=>"value"] 的字符形式
 * @param $array
 * @return string
 */
function var_array($array)
{
    $str = '['. PHP_EOL;
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $str .= var_array($v);
        } else {
            $str .= '"' . $k . '"' . '=>' . '"' . $v . '"' . ',' .PHP_EOL;
        }
    }
//    $str = rtrim($str,',');
    $str .= ']';
    return $str;
}