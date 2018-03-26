<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // 分类首页
    public function index()
    {
        return view('admins.categories.index');
    }

    // 新增分类
    public function create()
    {
        return view('admins.categories.create_or_edit');
    }
}
