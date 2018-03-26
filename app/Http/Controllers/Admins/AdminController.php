<?php
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;

class AdminController extends Controller{

    // 后台首页
    public function index()
    {
        return view('admins.index');
    }

}