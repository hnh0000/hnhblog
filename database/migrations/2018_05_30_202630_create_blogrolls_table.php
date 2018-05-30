<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link')->comment('链接');
            $table->string('name')->comment('友情连接昵称');
            $table->string('comment')->nullable()->comment('备注');
            $table->timestamps();
        });

        $data = [
            ['link' => 'blog.hnh117.com', 'name' => 'blog'],
            ['link' => 'blog.hnh117.com', 'name' => 'HnhBlog'],
            ['link' => 'blog.hnh117.com', 'name' => '火火火火'],
        ];

        $times = ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        array_walk($data, function(&$v) use ($times){
            $v = array_merge($v, $times);
        });

        DB::table('blogrolls')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogrolls');
    }
}
