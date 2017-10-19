<?php
/**
 * @doc 文章列表页
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:22 周二
 */
defined('InHeanes') or die('Access denied!');
?>
<div class="center-block center-wrap float-block">
    <div class="center-content">
        <!-- 文章列表 -->
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
                            <dd><a href="<?php echo $article['author']['url'];?>"><?php echo $article['author']['name'];?></a></dd>
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
        <?php echo $page;?>
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
