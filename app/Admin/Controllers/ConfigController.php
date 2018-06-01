<?php

namespace App\Admin\Controllers;

use App\Models\Config;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ConfigController extends Controller
{
    use ModelForm;

    /**
     * 展示列表.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('网站配置');
            $content->description('网站配置列表');

            $content->body($this->grid());
        });
    }

    /**
     * 编辑页.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('网站配置');
            $content->description('编辑网站配置');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * 创建页.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('网站配置');
            $content->description('创建网站配置');

            $content->body($this->form());
        });
    }

    /**
     * 展示列表网格.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Config::class, function (Grid $grid) {

            $grid->key('标识');
            $grid->name('配置昵称');
            $grid->value('值');

            $grid->created_at()->sortable();
            $grid->updated_at()->sortable();

            // 隐藏删除按钮
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->actions(function ($actions) {
                $actions->disableDelete();
            });
            $grid->disableCreateButton();// 禁用多选
//            $grid->disableRowSelector();// 禁用新增
        });
    }


    /**
     * 更新与创建的表单.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Config::class, function (Form $form) {

            $form->display('key', '标识');

            $form->text('name', '配置昵称')->rules('required|between:0,255');

            $form->textarea('value', '值')->rules('required|between:0,255');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

            $form->saving(function (Form $form) {
            });
        });
    }
}
