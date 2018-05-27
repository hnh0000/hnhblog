<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * 展示文章内容
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        $article->increment('watch', '1');
        return view('articles.show', compact('article'));
    }

    // 文章上传图片
    public function contentUpload(Request $request)
    {
        $url = $request->imageFile->store('article/content', 'public');
        return response(['url' => Storage::disk('public')->url($url), 'status' => 0, 'message' => '上传成功']);
    }

}