<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Comment;
use App\Observers\ArticleObserver;
use App\Observers\CommentOvserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('zh');

        Article::observe(ArticleObserver::class);
        Comment::observe(CommentOvserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
