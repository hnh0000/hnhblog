<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Comment $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->isAuthOf($comment);
    }
}
