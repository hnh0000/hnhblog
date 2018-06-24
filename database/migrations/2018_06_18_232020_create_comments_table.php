<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->comment('评论所属文章');
            $table->unsignedInteger('user_id')->comment('评论者id');
            $table->unsignedInteger('p_id')->default(0)->comment('回复某所属楼Id');
            $table->unsignedInteger('r_id')->default(0)->comment('回复用户id');
            $table->text('content')->comment('评论内容');
            $table->unsignedInteger('count_like')->default(0)->comment('点赞量');
            $table->timestamps();

            // 外键约定
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('cascade');
        });


        // 修改文章表
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->renameColumn('old_content','content');
            $table->unsignedInteger('count_comment')->default(0)->comment('回复数量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('count_comment');
        });
    }
}
