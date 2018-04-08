<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         // 填充文章数据
        $this->call(ArticleTableSeeder::class);

        // 填充后台数据
        $this->call(AdminDataSeeder::class);
    }
}
