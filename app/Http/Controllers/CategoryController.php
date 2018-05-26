<?php
/**
 * Created by PhpStorm.
 * User: 11234
 * Date: 2018/4/5
 * Time: 20:14
 */
namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller {

    public function show(Category $category)
    {
        $articles = $category->articles()->with('tags','category')->paginate(8);
        return view('index',compact('articles'));
    }
    
}