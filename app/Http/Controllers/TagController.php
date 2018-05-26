<?php
/**
 * Created by PhpStorm.
 * User: 11234
 * Date: 2018/4/5
 * Time: 21:19
 */
namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller {

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->with('tags','category')->paginate(10);
        return view('index',compact('articles'));
    }

}