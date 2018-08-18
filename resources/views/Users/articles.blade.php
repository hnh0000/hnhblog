@extends('Users._layout')

@section('user-content')
    <div class="main-col col-md-9">
        <ol class="breadcrumb">
            <li><a href="#">个人中心</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-body">
                <ul>
                    <li>
                        <a href="">我是内容1</a>
                    </li>
                    <li>
                        <a href="">我是内容1</a>
                    </li>
                    <li>
                        <a href="">我是内容1</a>
                    </li>
                    <li>
                        <a href="">我是内容1</a>
                    </li>
                </ul>
            </div>
        </div>
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading text-center">--}}
        {{--<i class="fa fa-thumbs-o-up faa-bounce"></i>--}}
        {{--点赞过得文章--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
        {{--<ul class="list-group">--}}
        {{--@foreach($articles as $article)--}}
        {{--<li class="list-group-item">--}}
        {{--<a class="rm-link-color" href="{{$article->link()}}">{{$article->content}}</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</div>--}}
    </div>
@endsection