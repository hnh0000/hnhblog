<?php
/**
 * Created by hnh.
 * Date: 2018/6/6
 * Time: 10:59
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Models\User;

trait Qq
{
    private $appid = null;
    private $appkey = null;
    private $callback = null;
    private $scope = null;
    private $accessToken = null;

    // 构造函数，读取 appid, appkey, callback, scope
    function __construct()
    {
        $qq = config('auth.qq');
        $this->appid = $qq['appid'];
        $this->appkey = $qq['appkey'];
        $this->callback = $qq['callback'];
        $this->scope = $qq['scope'];
    }

    // 跳转到QQ登录页面
    public function qqLogin()
    {
        $token = csrf_token();
        $url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id={$this->appid}&redirect_uri={$this->callback}&state={$token}&scope={$this->scope}";
        Header("Location: $url");
    }

    // 获取accessToken的所有信息
    public function accessTokens(string $code = null)
    {
        $code = $code ?: $_GET['code'];
        $url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$this->appid}&client_secret={$this->appkey}&code={$code}&redirect_uri={$this->callback}";
        $res = file_get_contents($url);
        // 请求错误
        if (strpos($res, 'callback') === 0) {
            $info = false;
        }else {
            foreach (explode('&', $res) as $item) {
                $ite = explode('=',$item);
                $info[$ite[0]] = $ite[1];
            }
            $this->accessToken = $info['access_token'];
        }
        return $info;
    }

    // accessToken续期
    public function refreshToken(string $refresh_token)
    {
        $url = "https://graph.qq.com/oauth2.0/token?grant_type=refresh_token&client_id={$this->appid}&client_secret={$this->appkey}&refresh_token={$refresh_token}";
        $res = file_get_contents($url);
        // 请求错误
        if (strpos($res, 'callback') === 0) {
            $info = false;
        }else {
            $info = explode('&', $res);
        }
        return $info;
    }

    // 获取用户 openid
    public function openId($accessToken=null,$code=null)
    {
        $accessToken = $accessToken?: ($this->accessToken?: $this->accessTokens($code)['access_token']);
        $url = "https://graph.qq.com/oauth2.0/me?access_token={$accessToken}";
        $res = trim(file_get_contents($url));
        $length = strpos($res,');');
        $str =  trim(substr($res,9,$length-9));
        $data = json_decode($str);
        return $data['openid'];
    }

}