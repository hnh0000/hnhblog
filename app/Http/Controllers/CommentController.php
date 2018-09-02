<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Observers\CommentOvserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 增加评论 api
    public function store(CommentRequest $request)
    {
        $data = Auth::user()->comments()->create($request->validated());

        return response()->json(['status' => 0,'msg' => 'success', 'message' => '创建成功', 'data' => $data]);
    }
    
    // 删除评论 api
    public function destroy(Comment $comment)
    {
        $this->authorize($comment);

        $comment->delete();

        return response()->json(['status' => 0,'msg' => 'success', 'message' => '删除成功']);
    }

    // 点赞评论
    public function like(Comment $comment)
    {
        $this->authorize('like', $comment);

        $comment->likes()->create(['user_id' => Auth::id()]);
        $comment->increment('count_like',1);

        return response(['status' => 0,'msg' => 'success', 'message' => '成功点赞', 'count' => $comment->count_like]);
    }

    // 取消点赞评论
    public function dislike(Comment $comment)
    {
        $this->authorize('dislike', $comment);

        $like = $comment->likes()->where('user_id',Auth::id())->delete();
        $comment->decrement('count_like',1);

        return response(['status' => 0,'msg' => 'success', 'message' => '取消点赞', 'count' => $comment->count_like]);
    }
}
