<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
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
}
