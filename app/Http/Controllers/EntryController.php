<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    // 展示首页
    public function index(Article $article)
    {
        $articles = $article->order()->paginate(8);
        return view('index',compact('articles'));
    }
}
