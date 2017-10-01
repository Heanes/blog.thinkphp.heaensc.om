<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
<meta name="renderer" content="webkit"><!-- 让360等多核模式浏览器默认用极速模式打开 -->
<meta name="author" content="Heanes heanes.com email(heanes@163.com)">
<meta name="keywords" content="软件,商务,HTML,tutorials,source codes">
<meta name="description" content="描述">
<link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
<link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/css.css"/>
<title>首页-后台管理-modernUI</title>
</head>
<body>
<div class="center wrap layout">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 后台布局的相关处理 -->
        <div class="layout-handle">
            <a href="javascript:;" id="fullScreen" class="handle" title="全屏"><i class="fa fa-arrows-alt layout-handle-icon"></i></a>
        </div>
        <!-- 顶部全宽度内容区域 -->
        <div class="main-top-block">
            <div class="header clearfix">
                <div class="admin-logo left-width">
                    <a href="/admin/" class="admin-log-href" id="homeStartHref" target="iframeRightContent">
                        <!--<i class="fa fa-gears admin-icon" aria-hidden="true"></i>-->
                        <img src="<?php echo TPL;?>/image/logo/logo.png" class="admin-icon" />
                        <span class="admin-title-text">管理后台<em class="system-version">v1.0</em></span>
                    </a>
                    <!-- 折叠左侧菜单 -->
                    <a href="javascript:;" class="lap-handle left-menu-lap-handle" id="lapLeftMenu" title="收缩/展开左侧菜单">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu-top">
                </div>
                <div class="admin-select-city">
                    <select class="select-city">
                        <option value="1">北京</option>
                        <option value="2">天津</option>
                        <option value="3">山西</option>
                        <option value="4">黑龙江</option>
                        <option value="5">吉林</option>
                        <option value="6">辽宁</option>
                        <option value="7">内蒙古</option>
                        <option value="8">广东</option>
                        <option value="9">广西</option>
                        <option value="10">福建</option>
                        <option value="11">海南</option>
                        <option value="11">湖北</option>
                        <option value="11">湖南</option>
                        <option value="11">河南</option>
                    </select>
                </div>
                <div class="admin-user-info toggle-show">
                    <div class="user-info">
                        <span class="user-name">方刚</span>
                        <span class="user-role">超级管理员</span>
                    </div>
                    <div class="toggle-show-info-block">
                        <div class="user-detail">
                            <dl>
                                <dt class="field">用户ID:</dt>
                                <dd class="value">01831</dd>
                            </dl>
                            <dl>
                                <dt class="field">电话:</dt>
                                <dd class="value">15010691715</dd>
                            </dl>
                            <dl>
                                <dt class="field">最后登录:</dt>
                                <dd class="value">2016-12-12 11:06:12 周一</dd>
                            </dl>
                        </div>
                        <div class="login-handle">
                            <a href="#" class="login-out"><i class="fa fa-power-off icon"></i>退出登录</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 左侧区域 -->
            <div class="left-block left-wrap left-width scrollbar"></div>
            <!-- 中心区域 -->
            <div class="center-block center-wrap iframe-container">
                <!-- tabs相关操作 -->
                <div class="tabs-handle">
                    <a href="javascript:;" id="refreshTab" class="handle" title="刷新标签"><i class="fa fa-refresh"></i></a>
                    <a href="javascript:;" id="closeAllTabs" class="handle" title="关闭全部标签"><i class="fa fa-close"></i></a>
                </div>
                <div class="tabs-container" id="tabsContainer">
                    <ul class="tab-title-container" id="tabsTitleContainer">
                        <li>
                            <div class="tab-title-wrap">
                                <i class="tab-title-icon fa fa-home" aria-hidden="true"></i>
                                <span class="tab-title-text">首页</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <iframe src="start.html"></iframe>
                    </div>
                </div>
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap"></div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap"></div>
        <!-- 底部全宽度内容区域 -->
        <div class="main-bottom-block"></div>
    </div>
    <!-- E 主要内容 E -->
</div>
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxcore.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxtabs.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxbuttons.js"></script>
    <script type="text/javascript" src="//r.html.heanes.com/work/heanes.com/treeView.js/js/treeView.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/layout.js"></script>
    <!-- E js E -->
</cite>
</body>
</html>