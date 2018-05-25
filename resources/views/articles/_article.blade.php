<article class="shade-1">
    <div id="title" role="row">

        <h2 class="text-center">{{ $article->title }}</h2>
        <div class="col-md-12 col-xs-12 col-sm-12" role="row"  style="padding-bottom: 5px;">
            <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip">
                <span aria-hidden="true" class="glyphicon-list glyphicon"></span> {{ $article->category->name }}
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 text-overflow">
                <span aria-hidden="true" class="glyphicon-tag glyphicon"></span> {{ implode( ',', $article->tags()->pluck('name')->toArray()) }}
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="top" title="创建于{{$article->created_at}}">
                <span aria-hidden="true" class="glyphicon-calendar glyphicon"></span> {{substr($article->created_at,0,10)}}
            </div>
            <div class="col-md-3 col-sm-5 col-xs-6" data-toggle="tooltip" data-placement="top" title="更新于{{$article->updated_at}}">
                <span aria-hidden="true" class="glyphicon glyphicon-pencil"></span> {{ $article->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>

    <h5 class="page-header"></h5>

    <div class="content markdown col-md-12 col-xs-12 col-sm-12">
        {!! $article->content  !!}
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12" role="row">
        <strong>
            回复数量:2
            /
            阅读数量:3
        </strong>
        <p class="pull-right" style="cursor: pointer;"><i class="glyphicon glyphicon-heart" style="color: #e8e8e8;"></i> 333</p>
    </div>

</article>

{{--评论区--}}
<div class="shade-1 col-md-12 col-sm-12 col-xs-12 chunk comments">


    <div class="input" role="row">
        <textarea class="form-control" rows="2" placeholder="很抱歉，暂时不支持 markdown 语法..." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 162px;" id="reply_content" name="body" cols="50" data-emojiable="converted" data-id="c4bab755-a391-48c2-a45e-619746e5960f" data-type="original-input"></textarea>
        <p class="pull-right btn btn-info" style="margin-top: 10px;">提交</p>
    </div>

    <hr>
    <div class="comment">
        <div class="pull-left">
            <img src="http://www.jq22.com/demo/jQueryComment201711092334/images/img.jpg" class="img-circle img-responsive" width="80" height="80">
        </div>
        <div class="comment_content">
            <p class="user_name">
                王尼玛
            </p>
            <p class="release_time text-muted" style=>
                <span class="text-muted">#1</span>&nbsp;

                <i class="glyphicon glyphicon-time"></i>
                3个月前
            </p>
            <p class="com">
                2018年5月25日18:05:062018年5月25日18:05:062018年5月25日18:05:062018年5月25日18:05:062018年5月25日18:05:062018年5月25日18:05:06
            </p>
        </div>
    </div>

</div>