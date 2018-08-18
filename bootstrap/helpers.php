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


//laravel mix 方法简单修改
function lmix($path, $manifestDirectory = '')
{
    static $manifests = [];

    if (! Str::startsWith($path, '/')) {
        $path = "/{$path}";
    }

    if ($manifestDirectory && ! Str::startsWith($manifestDirectory, '/')) {
        $manifestDirectory = "/{$manifestDirectory}";
    }

    if (file_exists(public_path($manifestDirectory.'/hot'))) {
        $url = file_get_contents(public_path($manifestDirectory.'/hot'));

        if (Str::startsWith($url, ['http://', 'https://'])) {
            return new HtmlString(Str::after($url, ':').$path);
        }

        return new HtmlString("//localhost:8080{$path}");
    }

    $manifestPath = public_path($manifestDirectory.'/mix-manifest.json');

    if (! isset($manifests[$manifestPath])) {
        if (! file_exists($manifestPath)) {
            throw new Exception('The Mix manifest does not exist.');
        }

        $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
    }

    $manifest = $manifests[$manifestPath];

    $path = str_replace($manifestDirectory,'', $path);
    if (! isset($manifest[$path])) {
        report(new Exception("Unable to locate Mix file: {$path}."));
        if (! app('config')->get('app.debug')) {
            return $path;
        }
    }

    return new HtmlString($manifestDirectory.$manifest[$path]);
}