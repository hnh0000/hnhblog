@extends('layouts.app')

@section('description',$article->describe)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                @include('articles._article')

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

            </div>

            @include('layouts._side')

        </div>
    </div>
@endsection