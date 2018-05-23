<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Plugs\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends  Controller {

    /**
     * 展示文章内容
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }
    
}