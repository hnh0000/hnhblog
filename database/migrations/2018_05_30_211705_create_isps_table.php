<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link')->comment('链接');
            $table->string('name')->comment('服务商提供昵称');
            $table->string('logo')->comment('服务商提供者图片');
            $table->string('comment')->nullable()->comment('备注');
            $table->timestamps();
        });

        $data = [
            ['link' => 'blog.hnh117.com', 'name' => 'blog', 'logo' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1233651729,1176627538&fm=27&gp=0.jpg'],
        ];

        $times = ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        array_walk($data, function(&$v) use ($times){
            $v = array_merge($v, $times);
        });

        DB::table('isps')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isps');
    }
}
