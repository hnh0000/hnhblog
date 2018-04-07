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
        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css',
    ];

    protected static $js = [
        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var simplemde = new SimpleMDE({
    
    spellChecker : false,
    autoDownloadFontAwesome: false,

});

EOT;
        return parent::render();
    }
}