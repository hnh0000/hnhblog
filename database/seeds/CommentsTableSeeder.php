<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有用户的id
        $user_ids = \App\Models\User::pluck('id')->toArray();
        // 获取所有文章的id
        $article_ids = \App\Models\Article::pluck('id')->toArray();

        // 顶级评论
        $comments = factory(\App\Models\Comment::class)->
        times(500)->
        make()->
        each(function ($comment) use ($user_ids, $article_ids) {
            $comment->user_id = array_random($user_ids);
            $comment->article_id = array_random($article_ids);
            $comment->p_id = 0;
            $comment->r_id = 0;
        });

        // 获取顶级评论的所属文章
        $comment_article_id = $comments->pluck('article_id')->toArray();

        // 子评论
        $comment_childs = factory(\App\Models\Comment::class)->
        times(2000)->
        make()->
        each(function ($comment) use ($user_ids, $comment_article_id) {
            $comment->user_id = array_random($user_ids);
            $comment->article_id = array_random($comment_article_id, $comment->p_id);
            $comment->p_id = mt_rand(1,500);
            $comment->r_id = array_random($user_ids);
        });

        $data = array_merge($comments->toArray(),$comment_childs->toArray());

        \App\Models\Comment::insert($data);

    }
}
