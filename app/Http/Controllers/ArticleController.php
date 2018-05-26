<?php
namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends  Controller {

    /**
     * 展示文章内容
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        $article->increment('watch','1');
        return view('articles.show',compact('article'));
    }
    
}