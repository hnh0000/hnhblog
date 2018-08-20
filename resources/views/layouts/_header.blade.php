<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- 网站昵称 -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!--左边导航-->
            <ul class="nav navbar-nav">

                @foreach(\App\Models\Category::select('name','id')->get() as $category)
                    <li class="{{ active_class(if_route_param('category', $category->id)) }}" style=""><a
                                href="{{ route('categories.show', $category->id) }}" class="">{{ $category->name }}</a>
                    </li>
                @endforeach

            </ul>

            {{--右边的导航条--}}
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown user_info">
                        <a href="#" class="dropdown-toggle" style="" data-toggle="dropdown" role="button"
                           aria-expanded="false" aria-haspopup="true" v-pre>
                            <img src="{{Auth::user()->avatar}}"
                                 class="img-circle" width="25" height="25" title="{{Auth::user()->name}}">
                            {{Auth::user()->name}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">

                            @isset(Auth::user()->admin_user_id)
                                <li>
                                    <a href="{{url(config('admin.route.prefix'))}}">进入后台</a>
                                </li>
                            @endisset

                            <li>
                                <a href="{{route('users.show', Auth::id())}}">
                                    <i class="glyphicon glyphicon-user"></i>&nbsp;
                                    个人中心
                                </a>
                            </li>

                            {{--<li>--}}
                                {{--<a href="">--}}
                                    {{--<i class="glyphicon glyphicon-edit"></i>&nbsp;--}}
                                    {{--编辑资料--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            <li>
                                <a href="javascript:;"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon"></i>
                                    退出
                                </a>
                                <form id="logout-form" action="{{route('auth.logout')}}" method="POST"
                                      style="display: none;">
                                    {{csrf_field()}}
                                </form>
                            </li>

                        </ul>
                    </li>
                    @else
                        <li><a href="javascript:;" data-toggle="modal" data-target="#b-modal-login">登录</a></li>
                    @endauth
            </ul>
        </div>
    </div>
</nav>


<!-- 点击登录的模态窗 -->
<div class="modal fade" data-backdrop="static" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row" style="margin-top: 20px;">
                    <li style="margin: 5px 0px;"  class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;" onclick="toLogin()"><img src="{{asset('/images/qq-login.png')}}"
                                                                        class=""
                                                                        alt="QQ登录"></a>
                    </li>
                    <li style="margin: 5px 0px;" class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;"><img src="{{asset('images/sina-login.png')}}" class=""
                                                    data-toggle="tooltip" alt="微博登录" title="正在申请接口中,暂时无法登录."></a>
                    </li>
                    <li style="margin: 5px 0px;" class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;"><img src="{{asset('images/github-login.jpg')}}" class=""
                                                    data-toggle="tooltip" alt="github登录" title="正在申请接口中,暂时无法登录."></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>

        function toLogin() {
            //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
            //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
            var A = window.open("{{route('auth.login')}}", "TencentLogin",
                "width=450,height=320,menubar=0,scrollbars=1,resizable=1,status=1,titlebar=0,toolbar=0,location=1");
        }

        $(".dropdown.user_info").hover(function () {
            $(this).addClass("open");
        }, function() {
            $(this).removeClass("open");
        });
    </script>
@endpush