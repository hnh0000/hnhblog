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
                        <div class="comment" id="reply_l#1" data-pid="1" data-floor_name="#1" data-reply_name="洪乃火">
                            <div class="pull-left">
                                <img src="http://www.jq22.com/demo/jQueryComment201711092334/images/img.jpg"
                                     class="img-circle img-responsive" width="80" height="80">
                            </div>
                            <div class="comment_content">
                                <p class="user_name">
                                    <a href="" style="color: #555555;">王尼玛</a>
                                </p>
                                {{--点赞，回复，删除 Begin--}}
                                <p class="release_time text-muted">
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
                                {{--单条子评论 Begin--}}
                                <div class="child_comment_content" id="reply_l#1_1" data-rid="2" data-name="洪乃火">
                                    <p>
                                        <a href="">洪乃火</a> 回复 <a href="">6666</a> :
                                        <span>此处是内容</span>
                                        <span hidden class="pull-right delete delete_reply" data-role="child"
                                              title="删除"><i
                                                    class="fa fa-times-circle"></i></span>
                                        <span hidden class="pull-right reply" title="回复" data-role="child"><i
                                                    class="fa fa-reply"></i></span>
                                    </p>
                                </div>

                                <div class="child_comment_content" id="reply_l#1_2" data-rid="22" data-name="666">
                                    <p>
                                        <a href="">666</a> 回复 <a href="">洪乃火</a> :
                                        <span>此处是内容</span>
                                        <span hidden class="pull-right delete delete_reply" data-role="child"
                                              title="删除"><i
                                                    class="fa fa-times-circle"></i></span>
                                        <span hidden class="pull-right reply" title="回复" data-role="child"><i
                                                    class="fa fa-reply"></i></span>
                                    </p>
                                </div>
                                {{--单条子评论 End--}}
                            </div>
                            {{--子评论 End--}}
                        </div>
                        <h5 class="page-header"></h5>
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
                            <a href="#reply_l1" class="floor_name">#1</a>
                            <strong>回复于</strong>
                            <a href="#reply_l1_1" class="reply_name">凉人炎</a>
                        </div>
                        {{--回复对象 End--}}
                        <input type="hidden" name="p_id">
                        <input type="hidden" name="r_id">
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
        var $textarea = $('textarea');
        var $show_text = $('.control_show.markdown');
        $('.reply_btn').click(function () {
            if ($textarea.val() == '') {
                return false;
            }
            if ($('#reply_info').is(":hidden")) { // 直接评论，不是回复某个评论
                var $html = '<div class="comment" id="reply_l#1" data-pid="1" data-floor_name="#1" data-reply_name="洪乃火">\n' +
                    '                        <div class="pull-left">\n' +
                    '                            <img src="http://www.jq22.com/demo/jQueryComment201711092334/images/img.jpg"\n' +
                    '                                 class="img-circle img-responsive" width="80" height="80">\n' +
                    '                        </div>\n' +
                    '                        <div class="comment_content">\n' +
                    '                            <p class="user_name">\n' +
                    '                                <a href="" style="color: #555555;">王尼玛</a>\n' +
                    '                            </p>\n' +
                    '                            {{--点赞，回复，删除 Begin--}}\n' +
                    '                            <p class="release_time text-muted" style=>\n' +
                    '                                <span class="text-muted">#1</span>&nbsp;\n' +
                    '                                <span>\n' +
                    '                                    <i class="glyphicon glyphicon-time"></i>\n' +
                    '                                    3年前\n' +
                    '                                </span>\n' +
                    '                                <span hidden class="pull-right delete delete_reply" title="删除">\n' +
                    '                                    <i class="fa fa-times-circle"></i>\n' +
                    '                                </span>\n' +
                    '                                <span class="pull-right reply" title="回复">\n' +
                    '                                    <i class="fa fa-reply"></i>\n' +
                    '                                </span>\n' +
                    '                                <span class="pull-right like unselect like" onclick="like($(this))" title="点赞">\n' +
                    '                                    <i class="fa fa-thumbs-o-up faa-bounce"></i>\n' +
                    '                                    <em>2</em>\n' +
                    '                                </span>\n' +
                    '                            </p>\n' +
                    '                            {{--点赞，回复，删除 End--}}\n' +
                    '                            <p class="com">\n' +
                    '                                我是一个评论，我是评论，我是评论\n' +
                    '                            </p>\n' +
                    '                        </div>\n' +
                    '                        {{--子评论 Begin--}}\n' +
                    '                        <div class="child_comment">\n' +
                    '                            {{--单条子评论 Begin--}}\n' +
                    '                            <div class="child_comment_content" id="reply_l#1_1" data-rid="2" data-name="洪乃火">\n' +
                    '                                <p>\n' +
                    '                                    <a href="">洪乃火</a> 回复 <a href="">6666</a> :\n' +
                    '                                    <span>此处是内容</span>\n' +
                    '                                    <span hidden class="pull-right delete delete_reply" data-role="child" title="删除"><i\n' +
                    '                                                class="fa fa-times-circle"></i></span>\n' +
                    '                                    <span hidden class="pull-right reply" title="回复" data-role="child"><i\n' +
                    '                                                class="fa fa-reply"></i></span>\n' +
                    '                                </p>\n' +
                    '                            </div>\n' +
                    '\n' +
                    '                            <div class="child_comment_content" id="reply_l#1_2" data-rid="22" data-name="666">\n' +
                    '                                <p>\n' +
                    '                                    <a href="">666</a> 回复 <a href="">洪乃火</a> :\n' +
                    '                                    <span>此处是内容</span>\n' +
                    '                                    <span hidden class="pull-right delete delete_reply" data-role="child" title="删除"><i\n' +
                    '                                                class="fa fa-times-circle"></i></span>\n' +
                    '                                    <span hidden class="pull-right reply" title="回复" data-role="child"><i\n' +
                    '                                                class="fa fa-reply"></i></span>\n' +
                    '                                </p>\n' +
                    '                            </div>\n' +
                    '                            {{--单条子评论 End--}}\n' +
                    '                        </div>\n' +
                    '                        {{--子评论 End--}}\n' +
                    '                    </div>\n' +
                    '                    <h5 class="page-header"></h5>';

                $('.comments .comment_body').append($html);
            } else { // 追加到指定楼层下
                $floor_ele = $('.input .alert .floor_name');// 回复楼层展示标签
                $reply_ele = $('.input .alert .reply_name');// 回复对象展示标签
                var $floor_name = $floor_ele.html();
                var $reply_name = $reply_ele.html();
                var $html = '<div class="child_comment_content" id="reply_l#1_1" data-rid="2" data-name="洪乃火">\n' +
                    '                                    <p>\n' +
                    '                                        <a href="">洪乃火</a> 回复 <a href="">6666</a> :\n' +
                    '                                        <span>此处是内容</span>\n' +
                    '                                        <span hidden class="pull-right delete delete_reply" data-role="child"\n' +
                    '                                              title="删除"><i\n' +
                    '                                                    class="fa fa-times-circle"></i></span>\n' +
                    '                                        <span hidden class="pull-right reply" title="回复" data-role="child"><i\n' +
                    '                                                    class="fa fa-reply"></i></span>\n' +
                    '                                    </p>\n' +
                    '                                </div>';
                $('.comment[data-floor_name="'+ $floor_name +'"]').find('.child_comment').append($html);
                $('.input .alert').slideUp(1000);
            }
            $textarea.val('');
            $show.hide(1000);
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
            r_id = p_id;// 回复对象的id
            floor_name = $ele.data('floor_name');// 楼层昵称
            reply_name = $ele.data('reply_name');// 回复对象昵称
            pid = '#' + $ele.attr('id');// 楼层锚链接
            rid = pid; // 回复对象锚链接
            if ($jqthis.data('role') == 'child') {
                rid = '#' + $jqthis.parents('.child_comment_content').attr('id');
                reply_name = $jqthis.parents('.child_comment_content').data('name');
                r_id = $jqthis.parents('.child_comment_content').data('rid');
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
                    $.get({
                        'url': '/',
                        'data': {},
//                        'dataType': 'json',
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