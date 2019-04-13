<?php
/**
 * @doc 文章
 * @author Heanes
 * @time 2018-05-05 10:43:28 周六
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
    <include file="layout/cssArticle"/>
    <title><?php echo $output['common']['title'].$output['common']['titleCommonSuffix'];?></title>
</head>
<body class="scrollbar scrollbar-mini responsive">
<!-- S header 头部 S -->
<include file="layout/header"/>
<!-- E header 头部 E -->
<!-- 模版文件内容开始 -->
{__CONTENT__}
<!-- 模版文件内容结束 -->
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