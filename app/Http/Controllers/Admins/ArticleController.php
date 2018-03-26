<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // 展示文章管理首页
    public function index()
    {
        return view('admins.articles.index');
    }
}
