<?php
/**
 * @doc 通用布局文件
 * @author Heanes
 * @time 2016-07-15 10:32:28
 */
defined('InHeanes') or die('Access denied!');
?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <!-- meta -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <!-- responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="renderer" content="webkit"/>
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)"/>
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes"/>
    <meta name="description" content="描述，不超过150个字符"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <!-- css -->
    <include file="layout/cssCommon"/>
    <title><?php echo $output['common']['title'].$output['common']['titleCommonSuffix'];?></title>
</head>
<body class="scrollbar scrollbar-mini responsive">
<!-- S header 头部 S -->
<include file="layout/header"/>
<!-- E header 头部 E -->
<!-- S main 主要内容 S -->
<div class="main">
    <!-- S main-top 主体顶部全宽度内容区域 S -->
    <div class="main-top"></div>
    <!-- E main-top 主体顶部全宽度内容区域 E -->
    <div class="main-wrap">
        <!-- S 主体顶部内容 S -->
        <div class="main-content-top"></div>
        <!-- E 主体顶部内容 E -->
        <!-- S 主体内容 S -->
        <div class="main-content clearfix">
            <!-- S 中心-左侧边栏区域 S -->
            <div class="left-wrap fl">
                <div class="left-content"></div>
            </div>
            <!-- E 中心-左侧边栏区域 E -->
            <!-- S 中心区域 S -->
            <div class="center-wrap fl">
                <!-- 模版文件内容开始 -->
                {__CONTENT__}
                <!-- 模版文件内容结束 -->
            </div>
            <!-- E 中心区域 E -->
            <!-- S 中心-右侧边栏区域 S -->
            <div class="right-wrap fl">
                <div class="right-content"></div>
            </div>
            <!-- E 中心-右侧边栏区域 E -->
        </div>
        <!-- S 主体底部区域 S -->
        <div class="main-content-bottom"></div>
        <!-- E 主体底部区域 E -->
    </div>
    <!-- S 底部全宽度内容区域 S -->
    <div class="main-bottom"></div>
    <!-- S 底部全宽度内容区域 S -->
</div>
<!-- E main 主要内容 E -->
<!-- S footer 脚部 S -->
<include file="layout/footer"/>
<!-- E footer 脚部 E -->

<!-- S 左侧钉住功能区 S -->
<div class="left-bar clearfix"></div>
<!-- E 左侧钉住功能区 E -->
<!-- S 右侧钉住功能区 S -->
<div class="right-bar clearfix"></div>
<!-- E 右侧钉住功能区 E -->
</body>
</html>