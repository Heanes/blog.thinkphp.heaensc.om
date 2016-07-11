<?php
/**
 * @doc 文章列表页
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:22 周二
 */
defined('inHeanes') or die('Access denied!');
?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <!-- responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
    <meta name="renderer" content="webkit"/><!-- 让360等多核模式浏览器默认用极速模式打开 -->
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)"/>
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes"/>
    <meta name="description" content="描述，不超过150个字符"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <!-- style -->
    <include file="layout/commonCss"/>
    <title>首页</title>
</head>
<body>
<div class="center wrap">
    <!-- S 头部 S -->
    <include file="layout/header"/>
    <!-- E 头部 E-->
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 左侧区域 -->
            <div class="left-block left-wrap float-block"></div>
            <!-- 中心区域 -->
            <div class="center-block center-wrap float-block">
                <!-- 首页文章列表模块 -->
                <div class="index-article-list-block">
                    <div class="article-list-block" id="indexArticleList">
                        <div class="article-list-row" v-for="article in indexArticleList">
                            <div class="article-title">
                                <h1 class="title"><a href="/article/{{article.id}}.html">{{article.title}}</a></h1>
                            </div>
                            <div class="article-info">
                                <dl>
                                    <dt>作者:</dt>
                                    <dd>{{article.author}}</dd>
                                </dl>
                                <dl>
                                    <dt>日期:</dt>
                                    <dd>{{article.publishTimeFormative}}</dd>
                                </dl>
                                <dl>
                                    <dt>人气:</dt>
                                    <dd>{{article.clickCount}}</dd>
                                </dl>
                                <dl>
                                    <dt>评论:</dt>
                                    <dd>{{article.commentCount}}</dd>
                                </dl>
                                <dl class="article-tags">
                                    <dt><i class="fa fa-tags" aria-hidden="true"></i><span class="tags">标签:</span></dt>
                                    <dd><a href="javascript:">前端</a></dd>
                                    <dd><a href="javascript:">CSS</a></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap float-block"></div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap">
            <!-- 底部推荐文章列表 -->
            <div class="recommend-article">
                <div class="should-be-see">
                    <ul class="recommend-list-ul">
                        <li>
                            <h3 class="title">不容错过</h3>
                        </li>
                        <li>
                            <div class="recommend-one">
                                <a class="title-href" href="javascript:void(0);">移动APP背后的秘密：间谍APP大阅兵</a>
                                <p class="meta">
                                    <span class="author"><a href="javascript:void(0);" title="由 heanes 发布" rel="author">heanes</a></span>
                                    <span class="time">2015-11-26</span>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- E 主要内容 E -->
    <!-- S 脚部 S -->
    <include file="layout/footer"/>
    <!-- E 脚部 E -->
</div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript" src="/public/static/libs/js/vue/1.0.20/vue.js"></script>
    <script type="text/javascript">
        $(function () {
            Vue.config.debug = true;
            var pathName = window.location.pathname;
            var API = {
                'articleList':'/api/article/list'
            };

            var indexArticleList = new Vue({
                el: '#indexArticleList',
                data: {
                    indexArticleList: []
                }
            });

            // 获取首页文章列表
            $.ajax({
                url: API.articleList,
                method: 'POST',
                data: {},
                dataType: "json",
                success: function (result) {
                    indexArticleList.indexArticleList = result.body || [];
                },
                fail: function (result) {
                    alert('数据异常！');
                }
            });

        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>
