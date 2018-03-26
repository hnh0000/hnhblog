<div class="left-sidebar">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="/assets/img/user04.png" alt="">
            </div>
            <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              洪乃火
          </span>
            <a href="/javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>


    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-link">
            <a href="{{ route('admins.index') }}">
                <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('categories.index') }}">
                <i class="am-icon-list sidebar-nav-link-logo"></i> 分类管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="">
                <i class="am-icon-tag sidebar-nav-link-logo"></i> 标签管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('articles.index') }}">
                <i class="am-icon-edit sidebar-nav-link-logo"></i> 文章管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/index.html">
                <i class="am-icon-cogs sidebar-nav-link-logo"></i> 网站设置
            </a>
        </li>
    </ul>
</div>