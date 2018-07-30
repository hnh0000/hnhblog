@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-3">
            <div class="box">
                <div class="padding-sm">
                    <div class="media">
                        <a href="">
                            <img data-toggle="tooltip" data-placement="top" title="修改头像" class="avatar" src="https://lccdn.phphub.org/uploads/avatars/20687_1513864346.jpeg?imageView2/1/w/200/h/200" alt="">
                        </a>
                    </div>
                    <hr>
                    <div class="media">
                        <ul style="margin-left: 0;padding-left: 0;text-align: center">
                            <li><span>ID：</span>234</li>
                            <li><span>昵称：</span>张三峰</li>
                            <li><span>性别：</span>男</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-col col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <i class="fa fa-thumbs-o-up faa-bounce"></i>
                    点赞过得文章
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <i class="fa fa-comments"></i>
                    回复我的评论
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li><li class="list-group-item">
                            <a href="">看起来还不错的话题</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection