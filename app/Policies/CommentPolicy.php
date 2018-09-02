<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    // 删除评论
    public function delete(User $user, Comment $comment)
    {
        return $user->isAuthOf($comment);
    }

    // 点赞
    public function like(User $user, Comment $comment)
    {
        return !$comment->isLike(true) && $comment->pid == 0;
    }

    // 取消赞
    public function dislike(User $user, Comment $comment)
    {
        return $comment->isLike(true) && $comment->pid == 0;
    }
}
