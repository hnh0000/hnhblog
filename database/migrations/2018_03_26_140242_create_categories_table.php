<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','30')->comment('分类名称');
            $table->timestamps();
        });

        // 初始化分类标签
        $data = [
            ['name' => 'PHP'],
            ['name' => '前端'],
            ['name' => 'APP'],
            ['name' => '其他技能'],
            ['name' => '生活日志'],
        ];

        \App\Models\Category::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
