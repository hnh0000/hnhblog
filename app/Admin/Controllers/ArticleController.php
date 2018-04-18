<?php

namespace App\Admin\Controllers;

use App\Models\Article;

use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
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

            $content->header('文章');
            $content->description('文章管理');

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

            $content->header('文章');
            $content->description('更新文章');

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

            $content->header('文章');
            $content->description('新增文章');

            $content->body($this->form());
        });
    }

    /**
     * 生成表格.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->column('id','ID')->sortable();

            $grid->surface_plot('封面图')->display(function($surface_plot) {
                $src = Storage::disk('public')->url($surface_plot);
                return "<img src='{$src}'  style='max-width:70px;max-height:50px' class='img'>";
            });

            $grid->column('category.name','分类')->display(function($category) {
                return $category;
            });

            $grid->tags('标签')->pluck('name')->display(function ($tags){
                $names = array_map(function($tag) {
                    return $tag;
                }, $tags->toArray());
                return join(',', $names);
            });

            $grid->title('标题')->display(function($text) {
                return str_limit($text,15);
            });

            $grid->old_content('正文')->display(function($text) {
                return str_limit($text, 80);
            });

            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');

            $states = [
                'on' => ['value' => true, 'text' => '显示'],
                'off' => ['value' => false, 'text' => '隐藏'],
            ];
            $grid->show('显示')->switch($states);

            $grid->watch('阅读量');

            $grid->filter(function($filter) {
                $filter->like('title', 'title');
                $filter->like('content', 'content');
                $filter->equal('show', 'show')->select([1 => '显示', 0 => '隐藏']);
            });

            $grid->tools(function($tools) {
                $tools->batch(function ($batch){
//                    $batch->disableDelete();
                });
            });

            $grid->disableExport();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->image('surface_plot','封面图')->move('article')->removable();

            $form->text('title', '标题')->rules('required');
            $form->select('category_id', '分类')->options(Category::pluck('name','id'))->rules('required');
            $form->multipleSelect('tags', '标签')->options(Tag::all()->pluck('name', 'id'))->rules('required');
            $form->text('author', '作者')->default(config('hnhBlog.article_author'))->rules('required');

            $states = [
                'on'  => ['value' => 1, 'text' => 'on'],
                'off' => ['value' => 0, 'text' => 'off'],
            ];
            $form->editor('old_content', '正文');
            $form->switch('show', '显示')->default(1)->states($states);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

            $form->saving(function($form) {
            });
        });
    }

}
