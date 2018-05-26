<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;

class PageController extends Controller
{

    // 展示首页
    public function index(Article $article)
    {
        $articles = $article->order()->with('tags','category')->paginate(setting('article_per_page'));
        return view('index',compact('articles'));
    }

}
