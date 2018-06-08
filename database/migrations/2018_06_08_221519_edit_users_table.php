<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->string('email')->nullable()->comment('邮箱')->change();

            $table->unsignedInteger('admin_user_id')->nullable()->comment('后台管理员用id');
            $table->string('open_id')->comment('用户唯一识别号');
            $table->string('avatar')->comment('头像');
            $table->enum('source', ['_0', '_1', '_2'])->comment('用户账号来源:_0=>QQ,_1=>微博,_2=>github');
            $table->enum('sex', ['_0', '_1', '_2'])->comment('性别:_0=>男,_1=>女,_2=>未知');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('users', function (Blueprint $table) {
            $table->string('password');
            $table->dropColumn(['open_id', 'source', 'avatar', 'sex']);
        });
    }
}
