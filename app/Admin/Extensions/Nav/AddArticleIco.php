<?php
/**
 * Created by hnh.
 * Date: 2018/4/18
 * Time: 22:27
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Admin\Extensions\Nav;

class AddArticleIco
{
    public function __toString()
    {
        $url = route('admin_articles.create');
        return <<<html
<li class="dropdown notifications-menu">
    <a href="{$url}" class="dropdown-toggle">
        <i class="fa fa-plus"></i>
    </a>
</li>
html;
    }
}