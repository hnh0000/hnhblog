<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta name="format-detection" content="email=no"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="renderer" content="webkit">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    	<title>[简历]洪乃火-PHP开发工程师/上海</title>
    	<link rel="shortcut icon" href="" type="image/x-icon">
        <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/resume.css')}}">
        <script>
            function loading(){
                document.getElementsByClassName('avatar')[0].style.display = 'block';
                document.getElementsByClassName('loading')[0].style.display = 'none';
            }
        </script>
    </head>
    <body>

        <header class="header"></header>
        
        <article class="container">
            <section class="side">
                <!-- 个人肖像 -->
                <section class="me">
                    <section class="portrait">
                        <div class="loading">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- 头像照片 -->
                        <img class="avatar" src="{{asset('images/avatar.jpg')}}" onload="loading()">
                    </section>

                    <h1 class="name">洪乃火</h1>
                    <h4 class="info-job">PHP开发工程师 / 上海</h4>

                </section>

                <!-- 基本信息 -->
                <section class="profile info-unit">
                    <h2><i class="fa fa-user" aria-hidden="true"></i>基本信息</h2>
                    <hr/>
                    <ul>
                        <li>
                            <label>个人信息</label>
                            <span>洪乃火 / 男 / 18岁</span>
                        </li>
                        <li><label>手机</label><a href="tel:17679282036" target="_blank">176-7928-2036</a></li>
                        <li><label>邮箱</label><a href="mailto:hnh2000@vip.qq.com" target="_blank">hnh2000@vip.qq.com</a></li>

                    </ul>
                </section>

                {{--<!-- 联系方式 -->
                <section class="contact info-unit">
                    <h2><i class="fa fa-phone" aria-hidden="true"></i>联系方式</h2>
                    <hr/>
                    <ul>
                        <li><label>个人主页</label><a href="http://0b11111110.com/" target="_blank">0b11111110.com/</a></li>
                        <li><label>Github</label><a href="https://github.com/0b11111110" target="_blank">github.com/0b11111110</a></li>
                    </ul>
                </section>--}}

                  <!-- 技能点 -->
                <section class="skill info-unit">
                    <h2><i class="fa fa-code" aria-hidden="true"></i>技能点</h2>
                    <hr/>
                    <ul>
                        <li><label>PHP</label><progress value="70" max="100"></progress></li>
                        <li><label>Laravel</label><progress value="70" max="100"></progress></li>
                        <li><label>HTML</label><progress value="60" max="100"></progress></li>
                        <li><label>CSS</label><progress value="60" max="100"></progress></li>
                        <li><label>JavaScript</label><progress value="50" max="100"></progress></li>
                        <li><label>Jquery</label><progress value="50" max="100"></progress></li>
                        <li><label>Vue</label><progress value="50" max="100"></progress></li>
                        <li><label>公众号</label><progress value="40" max="100"></progress></li>
                    </ul>
                </section>

                <!-- 技术栈 -->
                <!-- <div class="stack info-unit">
                    <h2><i class="fa fa-code" aria-hidden="true"></i>其他</h2>
                    <hr/>
                    <ul>
                        <li>
                            <label>前端</label>
                            <span>React、jQuery、微信小程序、Bootstrap、SASS、LESS</span>
                        </li>
                        <li>
                            <label>后端</label>
                            <span>Node.js、MySQL、MongoDB、WordPress、ThinkPHP</span>
                        </li>
                        <li>
                            <label>其他</label>
                            <span>Git、SVN、Markdown</span>
                        </li>
                    </ul>
                </div> -->
            </section>

            <section class="main">

                {{--<!-- 教育经历 -->
                <section class="edu info-unit">
                    <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i>教育经历</h2>
                    <hr/>
                    <ul>
                        <li>
                            <h3><span>XXXX大学 - XXX专业（硕士）</span><time>201X.9-201X.7</time></h3>
                            <p>专业排名<mark>X/XX</mark>，期间发表国际会议英文摘要X篇，国内核心期刊文章X篇（其中第一作者X篇），获XXX，XXX2次，XXX2次。(此处根据自身情况填写，可以突出自己的亮点，或者跟求职目标相关的内容)</p>
                        </li>
                        <li>
                            <h3><span>XXXX大学 - XXX专业（本科）</span><time>201X.9-201X.7</time></h3>
                            <p>专业排名<mark>X/XX</mark>，期间发表国内核心期刊文章X篇，三等奖学金X次。</p>
                        </li>
                    </ul>
                </section>--}}

                <!-- 工作经历 -->
                <section class="work info-unit">
                    <h2><i class="fa fa-shopping-bag" aria-hidden="true"></i>工作经历</h2>
                    <hr/>
                    <ul>
                        <li>
                            <h3>
                                <span>[经历1]b2b项目开发</span>
                                <time>2018.3-2018.5</time>
                            </h3>
                            <ul class="info-content">
                                <li>此项目为一个小型b2b商品交易平台，主要由公司双方进行货品的交易</li>
                                <li>前端交付页面于我，然后我负责开发</li>
                                <img src="{{asset('/images/11.png')}}" style="width: 500px;height: 300px;">
                                <img src="{{asset('/images/22.png')}}" style="width: 500px;height: 300px;">

                            </ul>
                        </li>
                    </ul>
                </section>

                    <!-- 项目经验 -->
                    <section class="project info-unit">
                        <h2><i class="fa fa-terminal" aria-hidden="true"></i>个人项目</h2>
                        <hr/>
                        <ul>

                            <li>
                                <h3>
                                    <span>LaraBBS</span>
                                    <!-- <span class="link"><a href="#" target="_blank"></a></span> -->
                                    <time>2018.2-2018.2</time>
                                </h3>
                                <ul class="info-content">
                                    <li>技术栈：Laravel+PHP+Bootstrap</li>
                                    <li>
                                        项目介绍: 一个简易的论坛.
                                        <br>
                                        前台: 发帖(百度api翻译获取Slug,优化SEO)，回复(站内通知，邮件通知,队列发送),展示活跃用户(任务调度，每小时计算一次。redis缓存)。
                                        <br>
                                        后台: 前台数据管理，角色，权限管理。

                                </ul>
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/larabbs1.gif" style="width: 500px;height: 300px;">
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/larabbs2.gif" style="width: 500px;height: 300px;">
                            </li>

                            <li>
                                <h3>
                                    <span>地猫商城</span>
                                    <!-- <span class="link"><a href="#" target="_blank">Demo</a></span> -->
                                    <time>2017.10-2017.12</time>
                                </h3>
                                <ul class="info-content">
                                    <li>技术栈：vue+php+laravel</li>
                                    <li>
                                        项目介绍：基于vue,laravel制作的一个商成.
                                        <br>
                                        前台： 搜索，查看，购买，收获地址，个人资料，收藏记录，订单记录，购物车
                                        <br>
                                        后台： 信息统计，订单管理，分类，属性，商品，轮播图管理,后台操作日志。
                                    </li>
                                </ul>
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/shop1.gif" style="width: 500px;height: 300px;">
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/shop2.gif" style="width: 500px;height: 300px;">
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/shop3.gif" style="width: 500px;height: 300px;">
                            </li>

                            <li>
                                <h3>
                                    <span>手机视频站</span>
                                    <time>2017.8-2017.9</time>
                                </h3>
                                <ul class="info-content">
                                    <li>技术栈：HTML5,css,js+vue+php+laravel</li>
                                    <li>
                                        项目介绍：前台基于vue-cli制作，后台基于Bootstrap+laravel.
                                        <br>
                                        前台： 观看视频
                                        <br>
                                        后台： 管理视频，管理标签，管理分类。
                                    </li>
                                </ul>
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/video1.gif" style="width: 500px;height: 300px;">
                            </li>

                            <li>
                                <h3>
                                    <span>三网通cms</span>
                                    <span class="link"><a href="http://swt.liangrenyan.com/#/" target="_blank">Demo</a></span>
                                    <time>2017.8-2017.9</time>
                                </h3>
                                <ul class="info-content">
                                    <li>技术栈：php+hdphp+微信公众号</li>
                                    <li>
                                        项目介绍：微信公众号(优惠88)，手机，pc的类似新闻cms站站，数据备份，可扩展开发.
                                    </li>
                                </ul>
                                <img src="http://hnh.oss-cn-qingdao.aliyuncs.com/jl/swt1.gif" style="width: 500px;height: 300px;">
                            </li>


                            <li>
                                <h3>
                                    <span>聚美，小米静态首页</span>
                                    <span class="link"><a href="/jm/" target="_blank">聚美</a></span>
                                    <span class="link"><a href="/xm/" target="_blank">小米</a></span>
                                    <time>2017.4-2017.4</time>
                                </h3>
                                <ul class="info-content">
                                    <li>技术栈：HTML,js,css+jquery</li>
                                </ul>
                            </li>

                        </ul>
                    </section>

                {{--<!-- 自我评价 -->
                <section class="work info-unit">
                    <h2><i class="fa fa-pencil" aria-hidden="true"></i>自我评价/期望</h2>
                    <hr/>
                    <p>[此处如果有一些能够量化的、且比较个性的指标会有加分，比如喜爱跑步坚持夜跑200小时或者200km等]<span class="mark-txt">“多静多思考，反省不张扬”</span>是我给自己总结的“十字箴言”，鞭策自己做人既不能以己度人，也不以人观己，要脚踏实地做事，坚持自己的梦想和本心。</p>
                </section>--}}
            </section>
        </article>

        

        <footer class="footer">
            <p>© 2018 洪乃火.文档最后更新时间为<time>2018年5月21日</time>.</p>
        </footer>

        <!-- 侧栏 -->
        <aside>
            <ul>
                {{--<li><a href="https://gitee.com/itsay/resume" target="_blank">源代码</a></li>--}}
                {{--<li><a href="http://itsay.me/" target="_blank">Blog</a></li>--}}
            </ul>
        </aside>

        <script src="./assets/js/index.js"></script>
    </body>
</html>