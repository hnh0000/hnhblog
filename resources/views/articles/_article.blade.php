<article>
    <div id="title" role="row">

        <h2 class="text-center">{{ $article->title }}</h2>
        <div class="col-md-3 col-sm-6 col-xs-6"><span aria-hidden="true" class="glyphicon-user glyphicon"></span> {{ $article->author }}</div>
        <div class="col-md-3 col-sm-6 col-xs-6"><span aria-hidden="true" class="glyphicon-calendar glyphicon"></span> {{ $article->updated_at->diffForHumans() }}</div>
        <div class="col-md-3 col-sm-6 col-xs-6"><span aria-hidden="true" class="glyphicon-list glyphicon"></span>{{ $article->category->name}}</div>
        <div class="col-md-3 col-sm-6 col-xs-6 text-overflow"><span aria-hidden="true" class="glyphicon-tag glyphicon"></span> {{ implode(',', $article->tags()->pluck('name')->toArray())}}</div>

    </div>

    <h5 class="page-header"></h5>

    <div class="content">
        {{ $article->content }}
    </div>
</article>