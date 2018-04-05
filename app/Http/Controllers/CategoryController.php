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
        $articles = $category->articles()->paginate(10);
        return view('categories.show', compact('articles'));
    }
    
}