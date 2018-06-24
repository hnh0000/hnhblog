<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    // 文章
    $router->resource('/articles', 'ArticleController')->names('admin.articles');
    // 标签
    $router->resource('/tags', 'TagController')->names('admin.tags');
    // 分类
    $router->resource('/categories', 'CategoryController')->names('admin.categories');
    // 用户
    $router->resource('/users', 'UserController')->names('admin.categories');
    // 站点配置
    $router->resource('/configs', 'ConfigController')->names('admin.configs')->except(['destroy']);
    // 友情链接
    $router->resource('/blogrolls', 'BlogrollController')->names('admin.blogrolls');
    // 服务提供商
    $router->resource('/isps', 'IspController')->names('admin.isps');
    // 评论
    $router->resource('/comments','CommentController')->names('admin.comments');
});
