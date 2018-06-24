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

        // 填充用户
        $this->call(UsersTableSeeder::class);

         // 填充文章数据
        $this->call(ArticleTableSeeder::class);

        // 填充评论
        $this->call(CommentsTableSeeder::class);
    }
}
