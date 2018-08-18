@extends('Users._layout')

@section('user-content')
    <div class="main-col col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <i class="fa fa-thumbs-o-up faa-bounce"></i>
                点赞过得文章
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($articles as $article)
                        <li class="list-group-item">
                            <a class="rm-link-color" href="{{$article->link()}}">{{$article->content}}</a>
                        </li>
                    @endforeach
                    <li class="list-group-item" style="border: none; background: #fcfcfc; margin-top: 8px; overflow: hidden">
                        <a href="javascript:;" onclick="goTo('/articles')" class="btn btn-default pull-right">所有文章</a>
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
                    @foreach($rMyComments as $rMyComment)
                        <li class="list-group-item">
                            <a class="rm-link-color" href="{{$rMyComment->link()}}">{{$rMyComment->content}}</a>
                        </li>
                    @endforeach
                    <li class="list-group-item" style="border: none; background: #fcfcfc; margin-top: 8px;overflow: hidden;">
                        <a href="javascript:;" onclick="goTo('/comments')" class="btn btn-default pull-right">所有评论</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection