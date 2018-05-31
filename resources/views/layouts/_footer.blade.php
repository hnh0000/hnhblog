<footer id="footer" class="wrap mobile shade-1" style="background: white;">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 desc">
                <h4 id="site-description" class="logo">{{setting('footer_title')}}</h4>
                <div class="describe">
                    {{setting('footer_description')}}
                </div>
            </div>
            <div class="col-md-4 not-mobile not-pad hidden-sm hidden-xs">
                <h5>友情链接</h5>
                <div class="row">
                    <div class="col-md-10">
                        <ul class="zeroed">
                            @foreach(\App\Models\Blogroll::get() as $item)
                                <li><a target="_blank" class="text-muted" rel="noreferrer noopener"
                                       href="{{$item->link}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-sm hidden-xs"><h5>服务提供商</h5>
                <ul class="zeroed">
                    @foreach(\App\Models\Isp::get() as $item)
                        <li style="margin-bottom: 10px;"><a
                                    href="{{Storage::disk('public')->url($item->link)}}" target="_blank"
                                    rel="noreferrer noopener"><img height="50px"
                                                                   src="{{$item->logo}}"
                                                                   alt="{{$item->name}}" title="{{$item->name}}" data-toggle="tooltip" data-placement="top"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h5 class="page-header"></h5>

        <div class="footer-bottom text-center">
            {!! setting('copyright') !!}
        </div>
    </div>
</footer>