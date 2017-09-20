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
<link rel="stylesheet" type="text/css" href="/public/static/libs/css/reset/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/libs/css/base/base.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/libs/fonts/font-awesome/4.5.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/style/style-2016.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/common.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/css.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/layout.css"/>
<title>首页-后台管理-modernUI</title>
</head>
<body>
<div class="center wrap layout">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 顶部全宽度内容区域 -->
        <div class="main-top-block">
            <div class="header">
                <div class="admin-logo left-width">
                    <!--<img class="admin-log-img" src="image/common/admin_head_logo.png">-->
                    <a href="start.html" class="admin-log-href" id="homeStartHref" target="iframeRightContent">
                        <i class="fa fa-gears admin-icon" aria-hidden="true"></i>
                        <span class="admin-title-text">管理后台</span>
                    </a>
                    <a href="javascript:;" class="lap-handle left-menu-lap-handle" title="收缩/展开">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu-top">
                    <ul class="menu-list" id="menuTopUl">
                        <li class="active"><a href="javascript:;">常用功能</a></li>
                        <li><a href="javascript:;">内容编辑</a></li>
                        <li><a href="javascript:;">网站设置</a></li>
                        <li><a href="javascript:;">站长维护</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 左侧区域 -->
            <div class="left-block left-wrap left-width">
                <div class="left-lap">
                    <a href="javascript:;" class="lap-handle left-menu-lap-handle" id="lapHandle" title="收缩/展开">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu-left-block">
                    <div class="menu-left-family active">
                        <ul class="menu-left-group">
                            <li>
                                <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-list menu-icon" aria-hidden="true"></i><span class="menu-text">数据列表</span></a>
                                <ul class="menu-left-group close">
                                    <li><a href="dataList/normal.html" class="menu-link"><i class="fa fa-list-alt menu-icon" aria-hidden="true"></i><span class="menu-text">普通数据列表</span></a></li>
                                    <li><a href="dataList/pictureList.html" class="menu-link"><i class="fa fa-picture-o menu-icon" aria-hidden="true"></i><span class="menu-text">图片列表</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-edit menu-icon" aria-hidden="true"></i><span class="menu-text">数据编辑</span></a>
                                <ul class="menu-left-group close">
                                    <li><a href="dataEdit/normal.html" class="menu-link"><i class="fa fa-file-text-o menu-icon" aria-hidden="true"></i><span class="menu-text">多类型数据编辑</span></a></li>
                                    <li><a href="dataEdit/tab.html" class="menu-link"><i class="fa fa-file-text-o menu-icon" aria-hidden="true"></i><span class="menu-text">多类型数-选项卡式据编辑</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-info-circle menu-icon" aria-hidden="true"></i><span class="menu-text">结果提示</span></a>
                                <ul class="menu-left-group close">
                                    <li><a href="javascript:;" class="menu-link"><i class="fa fa-check-square menu-icon" aria-hidden="true"></i><span class="menu-text">整页提示信息</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-left-family">
                        <ul class="menu-left-group">
                            <li><a href="javascript:;"><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">菜单1</span></a></li>
                            <li>
                                <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">菜单2</span></a>
                                <ul class="menu-left-group close">
                                    <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.1</span></a></li>
                                    <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.2</span></a></li>
                                    <li>
                                        <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.3</span></a>
                                        <ul class="menu-left-group close">
                                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.3.1</span></a></li>
                                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.3.2</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-left-family">
                        <ul class="menu-left-group">
                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">菜单3</span></a></li>
                            <li>
                                <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">菜单4</span></a>
                                <ul class="menu-left-group close">
                                    <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单4.1</span></a></li>
                                    <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单4.2</span></a></li>
                                    <li>
                                        <a href="javascript:;" class="menu-parent"><i class="menu-lap triangle-right" aria-hidden="true"></i><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单4.3</span></a>
                                        <ul class="menu-left-group close">
                                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.3.1</span></a></li>
                                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-table menu-icon" aria-hidden="true"></i><span class="menu-text">子菜单2.3.2</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-left-family">
                        <ul class="menu-left-group">
                            <li><a href="javascript:;" class="menu-link"><i class="fa fa-th-list menu-icon" aria-hidden="true"></i><span class="menu-text">菜单3</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 中心区域 -->
            <div class="center-block center-wrap">
                <iframe src="/admin/indexStart/index.html" class="right-iframe" name="iframeRightContent" id="iframeRightContent"></iframe>
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap"></div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap">
        </div>
        <!-- 底部全宽度内容区域 -->
        <div class="main-bottom-block"></div>
    </div>
    <!-- E 主要内容 E -->
</div>
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jquery.cookie/1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/layout.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/common/common.js"></script>
    <!-- E js E -->
</cite>
</body>
</html>