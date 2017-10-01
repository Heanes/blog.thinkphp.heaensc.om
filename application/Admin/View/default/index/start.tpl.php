<!DOCTYPE html>
<html>
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
<title>后台欢迎页面</title>
</head>
<body class="start">
<div class="center wrap">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 顶部全宽度内容区域 -->
        <div class="main-top-block"></div>
        <!-- 顶部内容 -->
        <div class="main-top-content main-wrap"></div>
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 中心区域 -->
            <div class="center-block center-wrap">
                <!-- 网站部分统计信息展示区域 -->
                <div class="report-count-block">
                    <div class="report-count-one">
                        <div class="report-icon-field article">
                            <i class="fa fa-file-text-o report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">文章总数：</span></th>
                                    <td><strong class="value">2859</strong><span class="unit">篇</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">65</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">17</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field comment">
                            <i class="fa fa-comments report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">评论总数：</span></th>
                                    <td><strong class="value">5681</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">49</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">26</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field member">
                            <i class="fa fa-user report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">用户总数：</span></th>
                                    <td><strong class="value">893</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">28</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">9</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field visitor">
                            <i class="fa fa-universal-access report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">访客总数：</span></th>
                                    <td><strong class="value">8791</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">490</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">独立IP：</span></th>
                                    <td><strong class="value">1089</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- 网站报表展示信息 -->
                <div class="report-chart-block">
                    <div class="box report-chart count-number">
                        <div class="title-bock"></div>
                        <div class="content-block">
                            <!-- 文章,评论,用户等统计信息图表展示 -->
                            <div class="count-report count-number" id="countNumber"></div>
                        </div>
                    </div>
                    
                    <div class="box report-chart count-visitor">
                        <div class="title-bock"></div>
                        <div class="content-block">
                            <!-- 网站访客地区统计图表展示 -->
                            <div class="count-report count-visitor" id="countVisitor"></div>
                            <!-- 网站访客使用浏览器统计图表展示 -->
                            <div class="count-report count-browser" id="countVisitorBrowser"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap"></div>
        <!-- 底部全宽度内容区域 -->
        <div class="main-bottom-block"></div>
    </div>
    <!-- E 主要内容 E -->
</div>
<!-- S 右侧功能区 S -->
<div class="right-bar">
    <div class="right-bar-content"></div>
</div>
<!-- E 右侧功能区 E -->
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.1.4/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jquery.cookie/1.4.1/jquery.cookie.js"></script>
    <!-- E js E -->
</cite>
</body>
</html>