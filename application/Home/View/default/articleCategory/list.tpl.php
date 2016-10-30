<?php
/**
 * @doc 文章列表页
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:22 周二
 */
defined('InHeanes') or die('Access denied!');
?>
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
                        <?php foreach ($output['data']['article']['rows'] as $key => $article)?>
                        <div class="article-list-row">
                            <div class="article-title">
                                <h1 class="title"><a href="/article/<?php echo $article['id'];?>.html"><?php echo $article['title'];?></a></h1>
                            </div>
                            <div class="article-info">
                                <dl>
                                    <dt>作者:</dt>
                                    <dd><?php echo $article['author'];?></dd>
                                </dl>
                                <dl>
                                    <dt>日期:</dt>
                                    <dd><?php echo $article['publishTimeFormative'];?></dd>
                                </dl>
                                <dl>
                                    <dt>人气:</dt>
                                    <dd><?php echo $article['clickCount'];?></dd>
                                </dl>
                                <dl>
                                    <dt>评论:</dt>
                                    <dd><?php echo $article['commentCount'];?></dd>
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
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript">
        $(function () {

        });
    </script>
    <!-- E js E -->
</cite>
