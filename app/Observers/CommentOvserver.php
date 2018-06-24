<?php
/**
 * Created by hnh.
 * Date: 2018/6/24
 * Time: 21:00
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Observers;

use App\Models\Comment;

class CommentOvserver
{
    public function deleting(Comment $comment)
    {

        // 当删除顶级评论的时候,删除子回复
        if( $comment->p_id == 0 ) {
            $comment->childs()->delete();
        }

    }
}