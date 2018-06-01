<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('key')->comment('标识');
            $table->string('name')->comment('配置昵称');
            $table->string('value')->nullable()->comment('值');
            $table->primary('key');
            $table->timestamps();
        });


        $data = [
            ['key' => 'title', 'value' => 'blog', 'name' => '网站标题'], // 网站标题
            ['key' => 'keywords', 'value' => '关键词', 'name' => '网站关键词'], // 网站关键词
            ['key' => 'description', 'value' => '网站描述', 'name' => '网站描述'], // 网站描述
            ['key' => 'footer_title', 'value' => '底部标题', 'name' => '底部标题'], // 底部标题
            ['key' => 'footer_description', 'value' => '博主很懒，什么都不愿意说', 'name' => '底部描述'],// 底部描述
            ['key' => 'article_per_page', 'value' => '8', 'name' => '文章分页数量'], // 网站文章分页数量
            ['key' => 'admin_prefix', 'value' => 'admin', 'name' => '后台访问前缀'], // 后台访问前缀
            ['key' => 'copyright', 'value' => '© CODECASTS 2018. All rights reserved. xxx', 'name' => '版权信息'], // 底部版权信息
            ['key' => 'logo', 'value' => 'https://blog.hnh117.com/storage/article/content/yLEMNnFKbfoS1fRJhfL9x0ul9hXtT9ObclJTBqBp.png', 'name' => 'logo图标'], // 底部版权信息
        ];

        $times = ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        array_walk($data, function(&$v) use ($times){
            $v = array_merge($v, $times);
        });

        \App\Models\Config::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
