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
            $table->unsignedInteger('p_id')->default(0)->comment('回复某个用户所属楼用户Id');
            $table->unsignedInteger('r_id')->default(0)->comment('回复用户id');
            $table->text('content')->comment('评论内容');
            $table->timestamps();
        });


        // 修改文章表
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->renameColumn('old_content','content');
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
    }
}
