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
            $table->text('content')->comment("文章内容");
            $table->string('surface_plot',100)->nullable()->comment('封面图');
            $table->integer('watch')->unsigned()->default('0')->comment('阅读次数');
            $table->boolean('show')->default(1)->comment('文章是否显示');
            $table->timestamps();

            // 外键约定
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
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
