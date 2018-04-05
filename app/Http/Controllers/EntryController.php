<?php

namespace App\Http\Controllers;

use App\Models\Article;

class EntryController extends Controller
{
    // 展示首页
    public function index()
    {
        $articles = Article::paginate(8);
        return view('index',compact('articles'));
    }
}
