<footer id="footer" class="wrap mobile shade-1" style="background: white;margin-top: 60px;">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 desc">
                <h4 id="site-description" class="logo">{{setting('footer_title')}}</h4>
                <div class="describe">
                    {{setting('footer_description')}}
                </div>
            </div>
            <div class="col-md-4 not-mobile not-pad">
                <h5>友情链接</h5>
                <div class="row">
                    <div class="col-md-10">
                        <ul class="zeroed">
                            <li><a target="_blank" class="text-muted" rel="noreferrer noopener" href="https://www.codecasts.com/vip">Laravel-china</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 not-mobile not-pad"><h5>服务提供商</h5>
                <ul class="zeroed">
                    <li style="margin-bottom: 10px;"><a
                                href="https://www.upyun.com?utm_source=laravist&amp;utm_medium=referral" target="_blank"
                                rel="noreferrer noopener"><img height="50px"
                                                               src="https://img.codecasts.com/upyun-logo.png?version=1.0"
                                                               alt="又拍云存储"></a></li>
                </ul>
            </div>
        </div>

        <h5 class="page-header"></h5>

        <div class="footer-bottom text-center">
            {!! setting('copyright') !!}
        </div>
    </div>
</footer>