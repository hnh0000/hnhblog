<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{

    // 展示首页
    public function index(Article $article)
    {
        $articles = $article->order()->with('tags','category')->paginate(8);
        return view('index',compact('articles'));
    }

}
