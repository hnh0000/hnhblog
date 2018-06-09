<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * 展示文章内容
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        $article->increment('watch', '1');
        return view('articles.show', compact('article'));
    }
    
    /**
     * 写文章图片上接口。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function contentUpload(Request $request)
    {
        $url = $request->imageFile->store('article/content', 'public');
        return response(['url' => Storage::disk('public')->url($url), 'status' => 0, 'message' => '上传成功']);
    }

    /**
     * 点赞
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function like(Article $article)
    {
        $this->authorize('like', $article);

        $article->likes()->create(['user_id' => Auth::id()]);
        $article->increment('count_like',1);

        return response(['status' => 0,'msg' => 'success', 'message' => '成功点赞', 'count' => $article->count_like]);
    }

    /**
     * 取消点赞
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function dislike(Article $article)
    {
        $this->authorize('dislike', $article);

        $like = $article->likes()->where('user_id',Auth::id())->delete();
        $article->decrement('count_like',1);

        return response(['status' => 0,'msg' => 'success', 'message' => '取消点赞', 'count' => $article->count_like]);
    }
}