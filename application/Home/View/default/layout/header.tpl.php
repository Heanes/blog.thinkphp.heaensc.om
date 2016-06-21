<?php
/**
 * @doc 公共头部
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 12:21:26 周二
 */
?>
<div class="header">
    <!-- 顶部操作/导航/工具栏 -->
    <div class="top-toolbar">
        <div class="main-wrap clearfix relative">
            <div class="top-menu"></div>
            <!-- 顶部右侧工具栏 -->
            <div class="top-handle-block">
                <div class="handle-block hover-change-block font-setting">
                    <div class="handle-content front">
                        <a class="handle handle-icon">字体设置</a>
                    </div>
                    <div class="handle-content backend">
                        <span class="text-songti" id="textSongti">宋体</span>
                        <span class="test-yahei" id="textYahei">微软雅黑</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 顶部导航栏 -->
    <div class="header-nav-bar">
        <div class="main-wrap clearfix">
            <!-- 头部logo区域 -->
            <div class="header-logo">
                <a href="javascript:" class="logo-a">
                    <img src="<?php echo TPL;?>/image/common/logo.png">
                </a>
            </div>
            <!-- 头部导航菜单区域 -->
            <div class="header-nav">
                <ul class="nav">
                    <li>
                        <a href="javascript:" class="nav-a current">
                            <i class="fa fa-home icon-nav icon-web-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-modx icon-nav icon-great"></i>
                            <span>精选推荐</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-hashtag icon-nav icon-special"></i>
                            <span>技术专题</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-edit icon-nav icon-write"></i>
                            <span>文字专栏</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-diamond icon-nav icon-self"></i>
                            <span>原创作品</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-info-circle icon-nav icon-about"></i>
                            <span>关于博客</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-github icon-nav icon-github"></i>
                            <span>GitHub</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a nav-login">
                            <i class="fa fa-user icon-nav icon-login"></i>
                            <span>登录</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" class="nav-a">
                            <i class="fa fa-user-plus icon-nav icon-register"></i>
                            <span>注册</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- 搜索区域 -->
            <div class="header-search">
                <input type="text" class="search-input" placeholder="搜索一下，什么都木有~" >
                <a href="javascript:" class="search-a-submit"><i class="icon-search fa fa-search"></i></a>
            </div>
        </div>
    </div>
</div>
