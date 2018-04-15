<?php

use Illuminate\Database\Seeder;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pdo = DB::connection()->getPdo(); //获取PDO实例

        $this->menuSeed($pdo);

    }

    /*
     * 填充路由菜单
     */
    public function menuSeed($pdo)
    {
        \Illuminate\Support\Facades\DB::table('admin_menu')->truncate();
        $_sql = file_get_contents(storage_path('app/sql/admin_menu.sql'));
        $_arr = explode(';', $_sql);
        array_pop($_arr);
        //执行sql语句
        foreach ($_arr as $_value) {
            $pdo->query($_value.';');
        }
    }
}
