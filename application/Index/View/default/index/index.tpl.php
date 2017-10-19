<?php
/**
 * @doc 首页模版
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:59:55 周二
 */
defined('InHeanes') or die('Access denied!');
?>
<!-- 左侧区域 -->
<div class="left-block left-wrap fl"></div>
<!-- 中心区域 -->
<div class="center-block center-wrap fl">
    <div class="center-content">
    <!-- 首页文章列表模块 -->
        <div class="index-article-list-block">
            <div class="article-list-block" id="indexArticleList">
                <?php foreach ($output['data']['article']['items'] as $key => $article){?>
                    <div class="article-list-row">
                        <div class="article-title">
                            <h1 class="title"><a href="/article/<?php echo $article['id'];?>.html"><?php echo $article['title'];?></a></h1>
                        </div>
                        <div class="article-info">
                            <div class="article-attribute-info">
                                <dl>
                                    <dt>作者:</dt>
                                    <dd><?php echo $article['author'];?></dd>
                                </dl>
                                <dl>
                                    <dt>日期:</dt>
                                    <dd><?php echo $article['publishTimeFormative'];?></dd>
                                </dl>
                                <dl>
                                    <dt>点击:</dt>
                                    <dd><?php echo $article['clickCount'];?></dd>
                                </dl>
                                <dl>
                                    <dt>评论:</dt>
                                    <dd><?php echo $article['commentCount'];?></dd>
                                </dl>
                            </div>
                            <div class="article-category-info">
                                <dl class="article-category">
                                    <dt><i class="fa fa-tasks label-icon" aria-hidden="true"></i><span>分类:</span></dt>
                                    <dd><a href="<?php echo $article['articleCategory']['url']?>"><?php echo $article['articleCategory']['name']?></a></dd>
                                </dl>
                                <dl class="article-tags">
                                    <dt><i class="fa fa-tags label-icon" aria-hidden="true"></i><span>标签:</span></dt>
                                    <?php foreach ($article['articleTagList'] as $index => $tag){?>
                                        <dd><a href="<?php echo $tag['url']?>"><?php echo $tag['name']?></a></dd>
                                    <?php }?>
                                </dl>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <!-- 文章分页 -->
            <?php echo $output['data']['article']['articlePageShow'];?>
        </div>
    </div>
</div>
<!-- 右侧区域 -->
<div class="right-block right-wrap fl"></div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript">
        $(function () {
            var API = {
                'articleList':'/api/article/list'
            };

        });
    </script>
    <!-- E js E -->
</cite>
