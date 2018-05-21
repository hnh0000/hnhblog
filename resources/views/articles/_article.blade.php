<article>
    <div id="title" role="row">

        <h2 class="text-center">{{ $article->title }}</h2>
        <div class="col-md-12 col-xs-12 col-sm-12" role="row"  style="padding-bottom: 5px;">
            <div class="col-md-3 col-sm-5 col-xs-5" data-toggle="tooltip">
                <span aria-hidden="true" class="glyphicon-list glyphicon"></span> {{ $article->category->name }}
            </div>
            <div class="col-md-3 col-sm-5 col-xs-5 text-overflow">
                <span aria-hidden="true" class="glyphicon-tag glyphicon"></span> {{ implode( ',', $article->tags()->pluck('name')->toArray()) }}
            </div>
            <div class="col-md-3 col-sm-5 col-xs-5" data-toggle="tooltip" data-placement="top" title="创建于{{$article->created_at}}">
                <span aria-hidden="true" class="glyphicon-calendar glyphicon"></span> {{substr($article->created_at,0,10)}}
            </div>
            <div class="col-md-3 col-sm-5 col-xs-5" data-toggle="tooltip" data-placement="top" title="更新于{{$article->updated_at}}">
                <span aria-hidden="true" class="glyphicon glyphicon-pencil"></span> {{ $article->updated_at->diffForHumans() }}
            </div>
        </div>

    </div>

    <h5 class="page-header"></h5>

    <div class="content markdown">
        {!! $article->content  !!}
    </div>
</article>