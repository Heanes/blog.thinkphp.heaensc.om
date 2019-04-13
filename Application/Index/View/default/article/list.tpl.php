<?php
/**
 * @doc 文章列表页
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:22 周二
 */
defined('InHeanes') or die('Access denied!');
?>
<div class="center-content">
    <div class="article-list-wrap">
        <div class="article-list">
            <?php if (!$output['data']['article']['items']){?>
                <div class="article-list-row no-data">
                    <div class="article-title no-data">
                        <h1 class="no-data-title">暂无数据</h1>
                    </div>
                    <div class="article-info no-data">
                        <img src="<?php echo TPL;?>/static/image/article/worker-more-work.png" />
                    </div>
                </div>
            <?php }else{?>
                <?php foreach ($output['data']['article']['items'] as $key => $article){?>
                    <div class="article-list-row">
                        <div class="article-title">
                            <h1 class="title"><a class="link title-link" href="/article/<?php echo $article['id'];?>.html"><?php echo $article['title'];?></a></h1>
                        </div>
                        <div class="article-info">
                            <div class="article-attribute-info">
                                <dl class="info-item">
                                    <dt class="item-name">作者:</dt>
                                    <dd class="item-value"><a class="link item-link" href="<?php echo $article['author']['url'];?>"><?php echo $article['author']['name'];?></a></dd>
                                </dl>
                                <dl class="info-item">
                                    <dt class="item-name">日期:</dt>
                                    <dd class="item-value"><?php echo $article['publishTimeFormative'];?></dd>
                                </dl>
                                <dl class="info-item">
                                    <dt class="item-name">点击:</dt>
                                    <dd class="item-value"><?php echo $article['clickCount'];?></dd>
                                </dl>
                                <dl class="info-item">
                                    <dt class="item-name">评论:</dt>
                                    <dd class="item-value"><?php echo $article['commentCount'];?></dd>
                                </dl>
                            </div>
                            <div class="article-category-info">
                                <dl class="info-item article-category">
                                    <dt class="item-name"><i class="fa fa-tasks label-icon" aria-hidden="true"></i><span>分类:</span></dt>
                                    <dd class="item-value"><a class="link item-link" href="<?php echo $article['articleCategory']['url']?>"><?php echo $article['articleCategory']['name']?></a></dd>
                                </dl>
                                <dl class="info-item article-tags">
                                    <dt class="item-name"><i class="fa fa-tags label-icon" aria-hidden="true"></i><span>标签:</span></dt>
                                    <?php foreach ($article['articleTagList'] as $index => $tag){?>
                                        <dd class="item-value"><a class="link item-link" href="<?php echo $tag['url']?>"><?php echo $tag['name']?></a></dd>
                                    <?php }?>
                                </dl>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>
        <!-- 文章分页 -->
        <div class="article-pager">
            <?php echo $output['data']['article']['articlePageShow'];?>
        </div>
    </div>
</div>
<cite>
    <!-- S js S -->
    <include file="layout/jsCommon"/>
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
