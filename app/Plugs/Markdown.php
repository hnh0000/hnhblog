<?php
/**
 * Created by hnh.
 * Date: 2018/4/14
 * Time: 21:45
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Plugs;



class Markdown{

    protected $parsedown;

    /**
     * 自动引用markdown解析类
     * Markdown constructor.
     * @param \Parsedown $parsedown
     */
    public function __construct(\Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }


    /**
     * 解析markdown内容
     * @param $text
     * @param bool $safe
     * @return string
     */
    public function markdown($text,$safe = true)
    {
        $this->parsedown->setSafeMode($safe);
        $html = $this->parsedown->text($text);
        return $html;
    }

}