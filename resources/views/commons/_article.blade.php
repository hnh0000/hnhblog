@foreach($articles as $article)

<article class="shade-1">

    <div role="row"  class="col-md-12 col-xs-12 col-sm-12">
        <h3 style="margin-top: 15px;"><a href="{{ route('articles.show',$article->id) }}">{{ $article->title }}</a></h3>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12" role="row"  style="padding-bottom: 5px;">
        <div class="col-md-2 col-sm-5 col-xs-5"><span aria-hidden="true" class="glyphicon-user glyphicon"></span> {{ $article->author }}</div>
        <div class="col-md-4 col-sm-5 col-xs-5"><span aria-hidden="true" class="glyphicon-calendar glyphicon"></span> {{ $article->updated_at->diffForHumans() }}</div>
        <div class="col-md-2 col-sm-5 col-xs-5"><span aria-hidden="true" class="glyphicon-list glyphicon"></span> {{ $article->category->name }}</div>
        <div class="col-md-4 col-sm-5 col-xs-5 text-overflow"><span aria-hidden="true" class="glyphicon-tag glyphicon"></span> {{ implode( ',', $article->tags()->pluck('name')->toArray()) }}</div>
    </div>

    <div role="row" class="col-md-12 col-xs-12 col-sm-12" style="padding-top: 5px;">
        <div class="col-md-4 col-sm-5 col-xs-5" style="">
            <a href="" class="thumbnail">
                <img class="" height="140" src="https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=3588772980,2454248748&fm=27&gp=0.jpg" alt="图片1" title="图片2">
            </a>
        </div>

        <p>
           {{ $article->content }}
        </p>
    </div>

    <div role="row" class="col-md-12 col-xs-12 col-sm-12">
        <a href=" {{ route('articles.show',$article->id) }} " class="btn btn-default pull-right btn-sm"><span class="glyphicon glyphicon-hand-right"></span> 查看全文</a>
    </div>

</article>

@endforeach