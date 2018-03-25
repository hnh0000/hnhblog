<?php

namespace App\Http\Controllers\Entries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    // 展示首页
    public function index()
    {
        return view('entries.index');
    }
}
