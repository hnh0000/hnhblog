<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 标签数量
        $tag_num = \App\Models\Tag::pluck('id')->toArray();

        factory(\App\Models\Article::class)
            ->times(50)
            ->create()->each(function ($article) use ($tag_num) {

            // 文章的标签
            $tag_ids = array_random($tag_num, mt_rand(1,5));

            // 文章添加标签
            $article->tags()->attach($tag_ids);

            // 标签的文章数加1
            \App\Models\Tag::whereIn('id', is_array($tag_ids) ? $tag_ids : [$tag_ids])->increment('article_num',1);
        });

    }
}
