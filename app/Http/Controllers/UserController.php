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
        $rMyComments = $user->rMyComments()->simplePaginate(15);
        $articles = $user->likeArticles()->simplePaginate(15);

        return view('users.show', compact('user', 'rMyComments', 'articles'));
    }

    public function articles(User $user)
    {
        $articles = $user->likeArticles()->paginate(30);

        return view('users.articles', compact('user','articles'));
    }

    public function comments(User $user)
    {
        $comments = $user->rMyComments()->paginate(30);
        return view('users.comments', compact('comments', 'user'));
    }

}
