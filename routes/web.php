<?php


// 首页
Route::get('/', 'PageController@index')->name('index');


// 文章上传图片接口
Route::post('articles/content_upload','ArticleController@contentUpload')->name('articles.content_upload');


// 文章，分类，标签
Route::resource('articles','ArticleController')->except('index');
Route::resource('categories','CategoryController')->only('show');
Route::resource('tags','TagController')->only('show');

// qq登录
Route::get('api/authorizations/qq','Oauth\AuthController@qq')->name('auth.qq');

// 简历
Route::resource('resumes', 'ResumeController')->only('index');