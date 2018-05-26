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
                    <li class="{{ active_class(if_route_param('category', $category->id)) }}" style=""><a href="{{ route('categories.show', $category->id) }}" class="">{{ $category->name }}</a></li>
                @endforeach

            </ul>

            {{--右边的导航条--}}
            <ul class="nav navbar-nav navbar-right">
                    @auth('admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" style="" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                <img src="http://www.jq22.com/demo/jQueryComment201711092334/images/img.jpg" class="img-circle" width="25" height="25">
                                {{Auth::guard('admin')->user()->username}} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url(config('admin.route.prefix'))}}">进入后台</a>
                                </li>
                                <li>
                                    <a href="{{ app(\App\Plugs\User::class)->logoutLink() }}">
                                        Logout
                                    </a>
                                    {{--<a href="{{ app(\App\Plugs\User::class)->logoutLink() }}"--}}
                                           {{--onclick="event.preventDefault();--}}
                                                         {{--document.getElementById('logout-form').submit();">--}}
                                        {{--Logout--}}
                                    {{--</a>--}}
                                    <form id="logout-form" action="" method="POST"
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
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row" style="margin-top: 20px;">
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;"><img src="{{asset('/images/qq-login.png')}}" class="img-responsive" data-toggle="tooltip" alt="QQ登录"   title="正在申请接口中,暂时无法登录."></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;"><img src="{{asset('images/sina-login.png')}}" class="img-responsive" data-toggle="tooltip" alt="微博登录" title="正在申请接口中,暂时无法登录."></a>
                    </li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                        <a href="javascript:;"><img src="{{asset('images/github-login.jpg')}}" class="img-responsive" data-toggle="tooltip" alt="github登录" title="正在申请接口中,暂时无法登录."></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>