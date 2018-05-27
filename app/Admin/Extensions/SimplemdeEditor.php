<?php
/**
 * Created by PhpStorm.
 * User: 11234
 * Date: 2018/4/7
 * Time: 11:12
 */

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class SimplemdeEditor extends Field
{
    protected $view = 'admin.simplemde-editor';

    protected static $css = [
        'assets/css/markdown.css',
    ];

    protected static $js = [
        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js',
        '/assets/js/paste-upload-image.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);
        $upload_url = route('articles.content_upload');
        $token = csrf_token();

        $this->script = <<<EOT
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{$token}'
            }
        });

var simplemde = new SimpleMDE({
    
    spellChecker : false,
    autoDownloadFontAwesome: false,
     toolbar: [
                "bold", "italic", "heading", "|", "quote", "code", "table",
                "horizontal-rule", "unordered-list", "ordered-list", "|",
                "link", "image", "|",  "side-by-side", 'fullscreen', "|",
                {
                    name: "guide",
                    action: function customFunction(editor){
                        var win = window.open('https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md', '_blank');
                        if (win) {
                            //Browser has allowed it to be opened
                            win.focus();
                        } else {
                            //Browser has blocked it
                            alert('Please allow popups for this website');
                        }
                    },
                    className: "fa fa-info-circle",
                    title: "Markdown 语法！",
                },
            ],

});

$(".editor-preview-side").addClass("markdown");

// 拖动，粘贴上传图片
$(".CodeMirror-scrolla").pasteUploadImage('{$upload_url}');





EOT;
        return parent::render();
    }
}