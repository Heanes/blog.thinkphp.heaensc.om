<?php
/**
 * @doc 文章列表页
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:22 周二
 */
defined('InHeanes') or die('Access denied!');
?>
<!-- 左侧区域 -->
<div class="left-block left-wrap float-block"></div>
<!-- 中心区域 -->
<div class="center-block center-wrap float-block">
    <!-- 首页文章列表模块 -->
    <div class="index-article-list-block">
        <div class="article-list-block" id="indexArticleList">
            <?php foreach ($output['data']['article']['items'] as $key => $article){?>
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
            <?php }?>
        </div>
        <!-- 文章分页 -->
        <?php echo $page;?>
    </div>
</div>
<!-- 右侧区域 -->
<div class="right-block right-wrap float-block"></div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript">
        $(function () {
            var pathName = window.location.pathname;
            var API = {
                'articleList':'/api/article/list'
            };

        });
    </script>
<!-- E js E -->
</cite>
