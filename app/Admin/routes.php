<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('/articles', 'ArticleController')->names('admin.articles');
    $router->resource('/tags', 'TagController')->names('admin.tags');
    $router->resource('/categories', 'CategoryController')->names('admin.categories');
    $router->resource('/users', 'UserController')->names('admin.categories');
    $router->resource('/configs', 'ConfigController')->names('admin.configs')->except(['destroy','create','store']);

});
