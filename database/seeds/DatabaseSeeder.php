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
        // 填充用户数据
//         $this->call(\App\Models\User::class);

         // 填充文章数据
        $this->call(ArticleTableSeeder::class);
    }
}
