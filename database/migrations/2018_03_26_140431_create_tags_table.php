<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','30')->comment('标签名称');
            $table->integer('article_num')->default('0')->comment('文章数量');
            $table->timestamps();
        });

        $data = [
            ['name' => 'laravel'],
            ['name' => '原生PHP'],
            ['name' => 'js'],
            ['name' => '转载'],
            ['name' => '生活'],
        ];

        \App\Models\Tag::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
