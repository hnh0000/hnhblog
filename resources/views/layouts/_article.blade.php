<div class="col-md-8 col-sm-12 col-xs-12">

    @foreach($articles as $article)

        <article class="shade-1">

            <div role="row" class="col-md-12 col-xs-12 col-sm-12">
                <h3 style="margin-top: 15px;"><a
                            href="{{ route('articles.show',$article->id) }}">{{ $article->title }}</a></h3>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12" role="row" style="padding-bottom: 5px;">
                <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip">
                    <span aria-hidden="true" class="glyphicon-list glyphicon"></span> {{ $article->category->name }}
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 text-overflow">
                    <span aria-hidden="true"
                          class="glyphicon-tag glyphicon"></span> {{ implode( ',', $article->tags->pluck('name')->toArray()) }}
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="top"
                     title="创建于{{$article->created_at}}">
                    <span aria-hidden="true"
                          class="glyphicon-calendar glyphicon"></span> {{substr($article->created_at,0,10)}}
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="top"
                     title="更新于{{$article->updated_at}}">
                    <span aria-hidden="true"
                          class="glyphicon glyphicon-pencil"></span> {{ substr($article->updated_at,0,10) }}
                </div>
            </div>

            <div role="row" class="col-md-12 col-xs-12 col-sm-12" style="padding-top: 5px;">
                <div class="col-md-4 col-sm-6 col-xs-6" style="">
                    <a href="" class="thumbnail">
                        <img class="" src="{{ Storage::disk('public')->url($article->surface_plot) }}"
                             alt="{{ $article->title }}" title="{{ $article->title }}">
                    </a>
                </div>

                <p style="font-size: 18px;">
                    {{ $article->describe }}
                </p>
            </div>

            <div role="row" class="col-md-12 col-xs-12 col-sm-12">
                <a href=" {{ route('articles.show',$article->id) }} " class="btn btn-default pull-right btn-sm">查看全文</a>
            </div>

        </article>

    @endforeach
        @if($articles->hasMorePages(11))
            <div class="chunk shade-1 col-md-12 col-xs-12 col-sm-12">
                {{ $articles->links() }}
            </div>
        @endif
</div>