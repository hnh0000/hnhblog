<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
    }
    
    public function show(User $user)
    {
        $rMyComments = $user->rMyComments()->with('user')->simplePaginate(15);
        $articles = $user->likeArticles();

        return view('users.show', compact('user', 'rMyComments', 'articles'));
    }

    public function articles(User $user)
    {
        $articles = $user->likeArticles();
        return view('users.articles', compact('user','articles'));
    }

    public function comments(User $user)
    {
        $comments = $user->rMyComments;
        return view('users.comments', compact('comments', 'user'));
    }

}
