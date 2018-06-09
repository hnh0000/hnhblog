<?php


// 首页
Route::get('/', 'PageController@index')->name('index');




// 文章，分类，标签
Route::post('articles/content_upload','ArticleController@contentUpload')->name('articles.content_upload');// 文章上传图片接口
Route::post('articles/{article}/like','ArticleController@like')->name('articles.like');// 点赞
Route::delete('articles/{article}/dislike','ArticleController@dislike')->name('articles.dislike');// 取消赞
Route::resource('articles','ArticleController')->only('show');
Route::resource('categories','CategoryController')->only('show');
Route::resource('tags','TagController')->only('show');


// Auth登录
Route::get('/login/{type?}','Auth\AuthController@login')->name('auth.login');
Route::post('/logout','Auth\AuthController@logout')->name('auth.logout');
// 登录成功后的回调
Route::get('auth/info/{type?}','Auth\AuthController@info')->name('auth.info');


// 简历
Route::resource('resumes', 'ResumeController')->only('index');