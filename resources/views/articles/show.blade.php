@extends('layouts.app')

@section('description',$article->describe)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                @include('articles._article')

                {{--评论区 Begin--}}
                <div class="shade-1 col-md-12 col-sm-12 col-xs-12 chunk comments">

                    {{--评论内容区 Begin--}}
                    <div class="comment_body">

                        {{--单条评论 Begin--}}
                        @foreach($comments as $k=>$comment)

                            <div class="comment" id="reply_l#{{$k+1}}" data-pid="{{$comment->id}}"
                                 data-id="{{$comment->user->id}}"
                                 data-floor_name="{{$k+1}}" data-reply_name="{{$comment->user->name}}">
                                <div class="pull-left">
                                    <img src="{{$comment->user->avatar}}"
                                         class="img-circle img-responsive" width="80" height="80">
                                </div>
                                <div class="comment_content">
                                    <p class="user_name">
                                        <a href="{{$comment->user->link()}}" style="color: #555555;">{{$comment->user->name}}</a>
                                    </p>
                                    {{--点赞，回复，删除 Begin--}}
                                    <p class="release_time text-muted">
                                        <span class="text-muted">#{{$k+1}}</span>&nbsp;
                                        <span>
                                        <i class="glyphicon glyphicon-time"></i>
                                            {{$comment->created_at->diffForHumans()}}
                                    </span>
                                        @can('delete',$comment)
                                            <span class="pull-right delete delete_reply" data-id="{{$comment->id}}"
                                                  title="删除">
                                        <i class="fa fa-times-circle"></i>
                                    </span>
                                        @endcan
                                        <span class="pull-right reply" title="回复">
                                        <i class="fa fa-reply"></i>
                                    </span>
                                        <span class="pull-right like unselect like {{active_class($comment->isLike())}}" onclick="like($(this), false, {{$comment->id}})" title="点赞">
                                        <i class="fa fa-thumbs-o-up faa-bounce"></i>
                                        <em>{{$comment->count_like}}</em>
                                    </span>
                                    </p>
                                    {{--点赞，回复，删除 End--}}
                                    <div class="com markdown markdown-auto">{{$comment->content}}</div>
                                </div>

                                @if( count($comment->childs) )
                                    {{--子评论 Begin--}}
                                    <div class="child_comment">
                                        {{--单条子评论 Begin--}}
                                        @foreach($comment->childs as $kk => $child)
                                            <div class="child_comment_content" style="overflow: hidden"
                                                 id="reply_l#{{$k+1}}_{{$kk+1}}" data-id="{{$child->user->id}}"
                                                 data-name="{{$child->user->name}}">
                                                <div class="">
                                                    <div class="pull-left">
                                                    <a href="{{$child->user->link()}}" class="" >{{$child->user->name}}</a> 回复 <a
                                                            href="{{$child->rUser->link()}}">{{$child->rUser->name}}</a> : &nbsp;
                                                    </div>
                                                    <div class="markdown markdown-auto pull-left">{{$child->content}}</div>
                                                </div>
                                                <p class="">
                                                    @can('delete',$child)
                                                        <span hidden class="pull-right delete delete_reply"
                                                              data-id="{{$child->id}}" data-role="child"
                                                              title="删除"><i
                                                                    class="fa fa-times-circle"></i></span>
                                                    @endcan
                                                    <span hidden class="pull-right reply" title="回复"
                                                          data-role="child"><i
                                                                class="fa fa-reply"></i></span>
                                                </p>
                                            </div>
                                        @endforeach
                                        {{--单条子评论 End--}}
                                    </div>
                                    {{--子评论 End--}}
                                @endif

                            </div>
                            <h5 class="page-header"></h5>

                        @endforeach
                        {{--单条评论 End--}}

                    </div>
                    {{--评论内容去 End--}}

                    {{--评论框 Begin--}}
                    <div class="input" role="row">
                        {{--回复对象 Begin--}}
                        <div class="alert alert-warning alert-dismissible" id="reply_info" role="alert" hidden>
                            <button type="button" class="close" title="取消"><span
                                        aria-hidden="true">&times;</span></button>
                            <strong>在</strong>
                            <a href="" class="floor_name"></a>
                            <strong>回复于</strong>
                            <a href="" class="reply_name"></a>
                        </div>
                        {{--回复对象 End--}}
                        <input type="hidden" name="p_id">
                        <input type="hidden" name="r_id">
                        <textarea class="form-control" rows="5" contenteditable="true"
                                  placeholder="支持 Markdown 语法， 请注意代码高亮." style="resize: vertical;"
                                  name="body" cols="50" data-emojiable="converted"
                                  data-type="original-input"></textarea>
                        <div class="btn_row">
                            <a href="javascript:;" class="ele" title="表情,开发中..." data-toggle="tooltip"
                               data-placement="top"><i class="fa fa-smile-o"></i></a>
                            <a href="javascript:;" class="ele" title="上传图片,开发中..." data-toggle="tooltip"
                               data-placement="top"><i class="fa fa-picture-o"></i></a>
                            <a href="javascript:;" class="ele md" data-toggle="tooltip" data-placement="top"
                               title="支持 Markdown 语法">支持 MD</a>
                            <p class="pull-right btn btn-primary reply_btn" style="margin-top: 10px;">提交</p>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="control_show markdown" hidden>

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
    {{--点击提交回复 Begin--}}
    <script>

        var fnClickReply = function () {
            if ($textarea.val() == '') {
                return false;
            }
            var $floor_serial = $('.comment_body>.comment:last').data('floor_name'); // 楼层昵称
            var new_floor_serial = $floor_serial + 1;// 楼层号
            new_floor_serial  = isNaN(new_floor_serial) ? 1 : new_floor_serial;
            var new_floor_name = 'reply_l#' + new_floor_serial; // 新回复的楼层好
            var content = $('.control_show').html();
            var pid = $('input[name="p_id"]').val(), rid = $('input[name="r_id"]').val();// 回复楼层所属id,回复对象id

            // post提交
            var $par_content = $textarea.val(),//评论内容
                $p_id = pid, // 回复楼层id
                $r_id = rid, // 回复对象id$par_content
                $article_id = '{{$article->id}}';
            var $par = {};
            $textarea.val('');
            if ($('#reply_info').is(":hidden")) { // 直接评论，不是回复某个评论
                $par = {article_id: $article_id, content: $par_content};
            } else {
                $par = {article_id: $article_id, p_id: $p_id, r_id: $r_id, content: $par_content};
            }
            $.post({
                url: '{{route('comments.store')}}',
                data: $par,
                success: function (response) {
                    var $data = response.data;
                    if ($('#reply_info').is(":hidden")) { // 直接评论，不是回复某个评论
                        var $html = '<div class="comment" id="reply_l#' + new_floor_serial + '" data-pid="' + $data.id + '"\n' +
                            '                                 data-id="' + user.id + '"\n' +
                            '                                 data-floor_name="' + new_floor_serial + '" data-reply_name="' + user.name + '">\n' +
                            '                                <div class="pull-left">\n' +
                            '                                    <img src="' + user.avatar + '"\n' +
                            '                                         class="img-circle img-responsive" width="80" height="80">\n' +
                            '                                </div>\n' +
                            '                                <div class="comment_content">\n' +
                            '                                    <p class="user_name">\n' +
                            '                                        <a href="{{Auth::user()?Auth::user()->link():''}}" style="color: #555555;">' + user.name + '</a>\n' +
                            '                                    </p>\n' +
                            '                                    {{--点赞，回复，删除 Begin--}}\n' +
                            '                                    <p class="release_time text-muted">\n' +
                            '                                        <span class="text-muted">#' + new_floor_serial + '</span>&nbsp;\n' +
                            '                                        <span>\n' +
                            '                                        <i class="glyphicon glyphicon-time"></i>\n刚刚' +
                            '                                    </span>\n' +
                            '                                            <span class="pull-right delete delete_reply" data-id="' + $data.id + '" title="删除">\n' +
                            '                                        <i class="fa fa-times-circle"></i>\n' +
                            '                                    </span>\n' +
                            '                                        <span class="pull-right reply" title="回复">\n' +
                            '                                        <i class="fa fa-reply"></i>\n' +
                            '                                    </span>\n' +
                            '                                        <span class="pull-right like unselect like" onclick="like($(this), false,'+ $data.id +')" title="点赞">\n' +
                            '                                        <i class="fa fa-thumbs-o-up faa-bounce"></i>\n' +
                            '                                        <em>0</em>\n' +
                            '                                    </span>\n' +
                            '                                    </p>\n' +
                            '                                    {{--点赞，回复，删除 End--}}\n' +
                            '                                    <div class="com markdown markdown-auto">\n' +
                            '                                         ' + content +
                            '                                    </>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                            <h5 class="page-header"></h5>\n' +
                            '                        {{--单条评论 End--}}';

                        $('.comments .comment_body').append($html);
                    } else {
                        // 抓取元素
                        var r_name = $('.reply_name').html();// 回复对象名称
                        var new_reply_id = 'reply_ll_' + Math.floor(Math.random() * 1000);// 新id,方便锚链接跳转
                        $floor_serial = $('.floor_name').text().substring(1);
                        var $reply_floor = $('.comment[data-floor_name="' + $floor_serial + '"]'); // 回复楼层
                        // 没有子评论的时候
                        if ($reply_floor.find('.child_comment').length == 0) {
                            $reply_floor.append('<div class="child_comment">\n' +
                                '</div>\n');
                        }
                        var $html = '<div class="child_comment_content" style="overflow: hidden"\n' +
                            '                                                 id="'+ new_reply_id +'" data-id="'+ user.id +'"\n' +
                            '                                                 data-name="'+ user.name +'">\n' +
                            '                                                <div class="">\n' +
                            '                                                    <div class="pull-left">\n' +
                            '                                                    <a href="javascript:;" class="" >'+ user.name +'</a> 回复 <a\n' +
                            '                                                            href="javascript:;">'+ r_name +'</a> : &nbsp;\n' +
                            '                                                    </div>\n' +
                            '                                                    <div class="markdown markdown-auto pull-left">'+ content +'</div>\n' +
                            '                                                </div>\n' +
                            '                                                <p class="">\n' +
                            '                                                        <span hidden class="pull-right delete delete_reply"\n' +
                            '                                                              data-id="'+ user.id +'" data-role="child"\n' +
                            '                                                              title="删除"><i\n' +
                            '                                                                    class="fa fa-times-circle"></i></span>\n' +
                            '                                                    <span hidden class="pull-right reply" title="回复"\n' +
                            '                                                          data-role="child"><i\n' +
                            '                                                                class="fa fa-reply"></i></span>\n' +
                            '                                                </p>\n' +
                            '                                            </div>';

                        $reply_floor.find('.child_comment').append($html);
                        $('.input .alert').slideUp(1000);

                        window.location.href = '{{route('articles.show',$article->id)}}' + '#' + new_reply_id;
                    }
                    $show.hide(1000);

                },
                error: function (response) {
                    ajax_error(response)
                }
            });
        };

        var $textarea = $('textarea');
        var $show_text = $('.control_show.markdown');
        $('.reply_btn').click(function () {
            must_loign(fnClickReply);
        });
    </script>
    {{--点击提交回复 End--}}

    {{--回复评论 Begin--}}
    <script>
        $(document).on('click', '.reply', function () {
            var floor_name, reply_name, p_id, r_id, $ele, pid, rid;
            var $jqthis = $(this);
            $ele = $jqthis.parents('.comment');
            p_id = $ele.data('pid');// 楼层所属id
            r_id = $ele.data('id');// 回复对象的id
            floor_name = '#' + $ele.data('floor_name');// 楼层昵称
            reply_name = $ele.data('reply_name');// 回复对象昵称
            pid = '#' + $ele.attr('id');// 楼层锚链接
            rid = pid; // 回复对象锚链接
            if ($jqthis.data('role') == 'child') {
                rid = '#' + $jqthis.parents('.child_comment_content').attr('id');
                reply_name = $jqthis.parents('.child_comment_content').data('name');
                r_id = $jqthis.parents('.child_comment_content').data('id');
            }
            $floor_ele = $('.input .alert .floor_name');// 回复楼层展示标签
            $reply_ele = $('.input .alert .reply_name');// 回复对象展示标签
            $floor_ele.html(floor_name);// 回复楼层文字修改
            $floor_ele.attr('href', pid);// 回复楼层锚链接修改
            $reply_ele.html(reply_name);// 回复对象文字修改
            $reply_ele.attr('href', rid);// 回复对象锚链接修改

            $('.input .alert').slideDown(1000);
            $('input[name="p_id"]').val(p_id);
            $('input[name="r_id"]').val(r_id);
            location.href = "#reply_info";
        });

        $('button.close').click(function () {
            $(this).parents('.alert').slideUp(1000);
        }); //移除click
    </script>
    {{--回复评论 End--}}

    {{--删除回复 Begin--}}
    <script>
        $(document).on('click', '.delete_reply', function () {
            var $jqthis = $(this);
            var $id = $jqthis.data('id');
            swal({
                    title: "确定删除吗？",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "确定",
                    closeOnConfirm: false,
                    cancelButtonText: "取消",
                    showLoaderOnConfirm: true,
                },
                function () {
                    $.post({
                        'url': '{{route('comments.destroy','')}}/' + $id,
                        'data': {_method: 'DELETE'},
                        'dataType': 'json',
                        'success': function (response) {
                            if ($jqthis.data('role') == 'child') { // 判断是否为子评论
                                $ele = $jqthis.parents('.child_comment_content');
                                if ($ele.siblings().length == 0) {
                                    $jqthis.parents('.child_comment').remove();
                                } else {
                                    $ele.remove();
                                }
                            } else {
                                $ele = $jqthis.parents('.comment');
                                $ele.next().remove();
                                $ele.remove();
                            }
                            swal.close();
                        },
                        'error': function (response) {
                            return ajax_error(response);
                        }
                    });
                });
        });
    </script>
    {{--删除回复 End--}}

    {{--解析markdown Begin--}}
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
    {{--解析markdown End--}}

@endpush