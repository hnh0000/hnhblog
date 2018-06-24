<?php


// 首页
Route::get('/', 'PageController@index')->name('index');




// 文章
Route::post('articles/content_upload','ArticleController@contentUpload')->name('articles.content_upload');// 文章上传图片接口
Route::post('articles/{article}/like','ArticleController@like')->name('articles.like');// 点赞
Route::delete('articles/{article}/dislike','ArticleController@dislike')->name('articles.dislike');// 取消赞
Route::resource('articles','ArticleController')->only('show');

// 分类
Route::resource('categories','CategoryController')->only('show');

// 标签
Route::resource('tags','TagController')->only('show');

// 评论
Route::resource('comments','CommentController')->except(['show','edit','create']);


// Auth登录
Route::get('/login/{type?}','Auth\AuthController@login')->name('auth.login');
Route::post('/logout','Auth\AuthController@logout')->name('auth.logout');// 退出登录
Route::get('auth/info/{type?}','Auth\AuthController@info')->name('auth.info'); // 用户授权登录后的回调页面


// 简历
Route::resource('resumes', 'ResumeController')->only('index');