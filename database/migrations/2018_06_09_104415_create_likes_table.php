<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户Id');
            $table->unsignedInteger('likeable_id')->comment('点赞的模型id');
            $table->string('likeable_type')->comemnt('点赞的模型类名');
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedInteger('count_like')->default('0')->comment('点赞数量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('count_like');
        });
    }
}
