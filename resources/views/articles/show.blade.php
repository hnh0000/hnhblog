@extends('layouts.app')

@section('description',$article->describe)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                @include('articles._article')

                {{--评论区 Begin--}}
                <div class="shade-1 col-md-12 col-sm-12 col-xs-12 chunk comments">
                    {{--单条评论 Begin--}}
                    <div class="comment" id="fllor_2">
                        <div class="pull-left">
                            <img src="http://www.jq22.com/demo/jQueryComment201711092334/images/img.jpg"
                                 class="img-circle img-responsive" width="80" height="80">
                        </div>
                        <div class="comment_content">
                            <p class="user_name">
                                王尼玛
                            </p>
                            {{--点赞，回复，删除 Begin--}}
                            <p class="release_time text-muted" style=>
                                <span class="text-muted">#1</span>&nbsp;
                                <span>
                                    <i class="glyphicon glyphicon-time"></i>
                                    3年前
                                </span>
                                <span hidden class="pull-right delete delete_reply" title="删除">
                                    <i class="fa fa-times-circle"></i>
                                </span>
                                <span class="pull-right reply" title="回复">
                                    <i class="fa fa-reply"></i>
                                </span>
                                <span class="pull-right like unselect like" onclick="like($(this))" title="点赞">
                                    <i class="fa fa-thumbs-o-up faa-bounce"></i>
                                    <em>2</em>
                                </span>
                            </p>
                            {{--点赞，回复，删除 End--}}
                            <p class="com">
                                我是一个评论，我是评论，我是评论
                            </p>
                        </div>
                        {{--子评论 Begin--}}
                        <div class="child_comment">
                            <div class="child_comment_content">
                                <p><a href="">洪乃火发生的洪乃火发生的撒洪乃火发生的撒洪乃火发生的撒洪乃火发生的撒洪乃火发生的撒洪乃火发生的撒撒</a> 回复 <a
                                            href="">6666</a>:<span>此此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容此处是内容处是内容</span>
                                </p>
                            </div>
                            <div class="child_comment_content">
                                <p>
                                    <a href="">洪乃火</a> 回复 <a href="">6666</a> :
                                    <span>此处是内容</span>
                                    <span hidden class="pull-right delete delete_reply" title="删除"><i
                                                class="fa fa-times-circle"></i></span>
                                    <span hidden class="pull-right reply" title="回复"><i class="fa fa-reply"></i></span>
                                </p>
                            </div>
                            <div class="child_comment_content">
                                <p><a href="">洪乃火</a> 回复 <a href="">6666</a>:<span>此处是内容</span></p>
                            </div>
                            <div class="child_comment_content">
                                <p><a href="">洪乃火</a> 回复 <a href="">6666</a>:<span>此处是内容</span></p>
                            </div>
                            <div class="child_comment_content">
                                <p><a href="">洪乃火</a> 回复 <a href="">6666</a>:<span>此处是内容</span></p>
                            </div>
                            <div class="child_comment_content">
                                <p><a href="">洪乃火</a> 回复 <a href="">6666</a>:<span>此处是内容</span></p>
                            </div>
                            <div class="child_comment_content">
                                <p><a href="">洪乃火</a> 回复 <a href="">6666</a>:<span>此处是内容</span></p>
                            </div>
                        </div>
                        {{--子评论 End--}}
                    </div>
                    <h5 class="page-header"></h5>
                    {{--单条评论 End--}}

                    {{--评论框 Begin--}}
                    <div class="input" role="row">
                        {{--回复对象 Begin--}}
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" title="取消" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <strong>在</strong>
                            <a href="">#3</a>
                            <strong>回复于</strong>
                            <a href="">凉人炎</a>
                        </div>
                        {{--回复对象 End--}}
                        <textarea class="form-control" rows="5" contenteditable="true"
                                  placeholder="很抱歉，暂时不支持 markdown 语法..." style="resize: vertical;"
                                  name="body" cols="50" data-emojiable="converted"
                                  data-type="original-input"></textarea>
                        <div class="btn_row">
                            <a href="javascript:;" class="ele" title="表情,开发中..." data-toggle="tooltip"
                               data-placement="top"><i class="fa fa-smile-o"></i></a>
                            <a href="javascript:;" class="ele" title="上传图片,开发中..." data-toggle="tooltip"
                               data-placement="top"><i class="fa fa-picture-o"></i></a>
                            <a href="javascript:;" class="ele md" data-toggle="tooltip" data-placement="top"
                               title="支持 Markdown 语法">支持 MD</a>
                            <p class="pull-right btn btn-primary" style="margin-top: 10px;">提交</p>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="control_show markdown">

                        </div>
                    </div>
                    {{--评论框 End--}}

                </div>
                {{--评论区 End--}}

            </div>

            @include('layouts._side')

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $('.delete_reply').click(function () {
            swal({
                    title: "确定删除吗？",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "确定",
                    closeOnConfirm: false,
                    cancelButtonText: "取消",
                },
                function () {
                    $.post({
                        'url': '/',
                        'data': {},
                        'dataType': 'json',
                        'success': function (response) {

                        },
                        'error': function (response) {
                            return ajax_error(response);
                        }
                    });
                });
        });
    </script>

    {{--解析markdown--}}
    <script>
        // 抓取常用元素
        $show = $('.control_show');

        // 创建实例
        var converter = new showdown.Converter();

        // 输入内容后自动解析为markdown
        $('textarea').bind('input propertychange', function () {
            $show.show();
            var val = converter.makeHtml($(this).val());
            if (val == '') {
                $show.hide();
            }
            $show.html(val);
        })
    </script>
@endpush