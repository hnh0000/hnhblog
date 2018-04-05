<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->comment('分类表主键');

            $table->string('title','80')->comment("标题");
            $table->string('author','20')->default(config('hnhBlog.article_author'))->comment("作者");
            $table->text('content')->comment("文章内容");
            $table->integer('watch')->unsigned()->default('0')->comment('阅读次数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}