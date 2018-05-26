<?php
/**
 * Created by hnh.
 * Date: 2018/5/27
 * Time: 16:33
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class JsonTextarea extends Field
{
    protected $view = 'admin.json-textarea';

    protected static $css = [
//        'assets/css/markdown.css',
    ];

    protected static $js = [
//        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);
        return parent::render();
    }
}