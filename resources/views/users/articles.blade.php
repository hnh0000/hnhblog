@extends('Users._layout')

@section('user-content')
    <div class="main-col col-md-9">
        <ol class="breadcrumb">
            <li><a href="javascript:;" onclick="goToUserContent()">个人中心</a></li>
            <li class="active">Ta 点赞文章列表</li>
        </ol>

        <div class="panel panel-default ">
            <div class="panel-body">
                @if (!$articles->count())
                    <div class="empty-block">
                        没有任何数据~~
                    </div>
                @else
                    <ul class="list-group">
                        @foreach($articles as $article)
                            <li class="list-group-item">
                                <a class="rm-link-color" href="{{$article->link()}}">{{$article->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="pull-right">
                        {{ $articles->links() }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection