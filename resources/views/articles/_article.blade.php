<article class="shade-1">
    <div id="title" role="row">

        <h2 class="text-center">{{ $article->title }}</h2>
        <div class="col-md-12 col-xs-12 col-sm-12" role="row" style="padding-bottom: 5px;">
            <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip">
                <span aria-hidden="true" class="glyphicon-list glyphicon"></span> {{ $article->category->name }}
            </div>
            @php
                $tags = implode( ',', $article->tags()->pluck('name')->toArray());
            @endphp
            <div class="col-md-3 col-sm-6 col-xs-6 text-overflow" data-toggle="tooltip" data-placement="top"
                 title="{{'标签:'.$tags}}">
                <span aria-hidden="true" class="glyphicon-tag glyphicon"></span> {{ $tags }}
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="top"
                 title="创建于:{{$article->created_at}}">
                <span aria-hidden="true"
                      class="glyphicon-calendar glyphicon"></span> {{substr($article->created_at,0,10)}}
            </div>
            <div class="col-md-3 col-sm-5 col-xs-6" data-toggle="tooltip" data-placement="top"
                 title="更新于:{{$article->updated_at}}">
                <span aria-hidden="true"
                      class="glyphicon glyphicon-pencil"></span> {{ substr($article->updated_at,0,10) }}
            </div>
        </div>
    </div>

    <h5 class="page-header"></h5>

    <div class="content markdown col-md-12 col-xs-12 col-sm-12">
        {!! $article->content  !!}
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 belong" role="row">
        <strong>
            回复数量:2
            /
            阅读数量:{{$article->watch}}
        </strong>
        <p class="pull-right {{active_class($article->isLike(true))}}" onclick="like($(this))" data-toggle="tooltip"
           data-placement="top"
           title="">
            <i class="glyphicon glyphicon-heart"></i> <span>{{$article->likes()->count()}}</span>
        </p>
    </div>

</article>

@push('scripts')
    <script>
        function like(jqthis) {
            must_loign(function (jqthis) {
                if (jqthis.hasClass('ban')) {
                    return false;
                }
                $par = jqthis.hasClass('active') ? {'_method': 'DELETE'} : {};// 判断是点赞还是取消点赞
                $msg = jqthis.hasClass('active') ? '点赞' : '取消点赞';
                $url = jqthis.hasClass('active') ? '{{route('articles.dislike',$article->id)}}' : '{{route('articles.like',$article->id)}}'
                jqthis.attr('title', '操作正在执行中...');
                jqthis.addClass('ban');
                $.post($url, $par, function (response) {
                    jqthis.toggleClass('active');
                    jqthis.find('span').text(response.count);
                    jqthis.attr('title', $msg);
                    jqthis.removeClass('ban');
                }, 'json');
            }, jqthis);
        }
    </script>
@endpush