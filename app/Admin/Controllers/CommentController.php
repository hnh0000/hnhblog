<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Comment;

use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommentController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('评论');
            $content->description('评论列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('评论');
            $content->description('评论编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('评论');
            $content->description('评论创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Comment::class, function (Grid $grid) {

            $grid->actions(function ($actions) {
                // 当前行的数据数组
                $data = $actions->row;

                $url = route('articles.show',$data->article_id);

                // 查看评论
                $actions->prepend('<a href="'. $url .'" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;');
            });

            $grid->disableCreateButton();

            $grid->id('ID')->sortable();

            $grid->user_id('user')->display(function($text) {
                return User::find($text)->name;
            });

            $grid->article_id('article')->display(function ($text) {

                return Article::find($text)->title;
            });

            $grid->content();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Comment::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('user_id','user');

            $form->editor('content','content');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
