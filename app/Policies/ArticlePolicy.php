<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;


    /**
     * 点赞
     * 
     * @param User $user
     * @param Article $article
     * @return bool
     */
    public function like(User $user, Article $article)
    {
        return !$article->isLike(true);
    }

    /**
     * 取消点赞
     *
     * @param User $user
     * @param Article $article
     * @return bool
     */
    public function dislike(User $user, Article $article)
    {
        return $article->isLike(true);
    }
}
