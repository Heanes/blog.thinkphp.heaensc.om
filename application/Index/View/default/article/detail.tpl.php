<?php
/**
 * @doc 文章详情
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:49 周二
 */
defined('InHeanes') or die('Access denied!');
?>
<link type="text/css" rel="stylesheet" href="//r.html.heanes.com/work/heanes.com/autoCatalog.js/css/autoCatalog.css">
<!-- 文章导航目录样式 -->
<div class="main-content main-wrap clearfix">
    <!-- 左侧区域 -->
    <div class="left-block left-wrap fl"></div>
    <!-- 中心区域 -->
    <div class="center-block center-wrap fl">
        <div class="center-content">
            <div class="page-content">
                <div class="article-detail-page">
                    <!-- 面包屑导航链接 -->
                    <div class="page-breadcrumb article-category">
                        <div class="breadcrumb-wrap">
                            <div class="breadcrumb-cell breadcrumb-node breadcrumb-root">
                                <span class="breadcrumb-text"><a href="javascript:void(0);">首页</a></span>
                            </div>
                            <div class="breadcrumb-cell breadcrumb-delimiter">
                                <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </div>
                            <?php foreach ($output['data']['articleCategoryTree'] as $key => $item){?>
                                <div class="breadcrumb-cell breadcrumb-node">
                                    <span class="breadcrumb-text"><a href="<?php echo $item['url'];?>"><?php echo $item['name'];?></a></span>
                                </div>
                                <?php if(($key + 1) < count($output['data']['articleCategoryTree'])){?>
                                <div class="breadcrumb-cell breadcrumb-delimiter">
                                    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- 单篇文章 -->
                    <div class="article-block">
                        <div class="article-title-block">
                            <!-- 文章标题 -->
                            <div class="article-title">
                                <h1 class="entry-title"><?php echo $output['data']['title'];?></h1>
                            </div>
                            <!-- 文章相关属性信息 -->
                            <div class="article-info">
                                <dl class="article-info-dl">
                                    <dt>人气:</dt>
                                    <dd><?php echo $output['data']['clickCount'];?></dd>
                                    <dt><a href="#comment-list" class="comment-count">评论:</a></dt>
                                    <dd><a href="#comment-list" class="comment-count"><?php echo $output['data']['commentCount'];?></a></dd>
                                    <dt>作者:</dt>
                                    <dd><a href="<?php echo $output['data']['author']['url'];?>"><?php echo $output['data']['author']['name'];?></a></dd>
                                    <dt>责编:</dt>
                                    <dd><?php echo $output['data']['editor'];?></dd>
                                    <dt>时间:</dt>
                                    <dd><?php echo $output['data']['publishTimeFormative'];?></dd>
                                    <dt>来源:</dt>
                                    <dd><?php echo $output['data']['originSource'];?></dd>
                                </dl>
                            </div>
                            <div class="article-operate">
                                <span class="op-to-small-text" id="opToSmallTextBtn">T</span>
                                <span class="op-to-large-text" id="opToLargeTextBtn">T</span>
                            </div>
                        </div>
                        <div class="article-title-block-placeholder" id="articleTitleBlockPlaceholder"></div>
                        <!-- 文章摘要 -->
                        <!--<div class="article-abstract">
                            <strong>摘要：</strong>摘要内容....
                        </div>-->
                        <!-- 文章主体 -->
                        <div class="article-content" id="articleContent"><?php echo $output['data']['content'];?></div>
                        <div class="article-meta">
                            <p class="article-tags">本文关键词：
                                <strong>
                                    <?php foreach ($output['data']['articleTagList'] as $key => $item){?>
                                        <a href="<?php echo $item['url'];?>"><?php echo $item['name'];?><?php if(($key + 1) < count($output['data']['articleTagList'])){?>，<?php }?></a>
                                    <?php }?>
                                </strong></p>
                        </div>
                    </div>
                    <!-- 作者相关信息 -->
                    <div class="article-author-info relative">
                        <div class="author-avatar inline-block">
                            <i style="background-image:url('<?php echo TPL;?>/image/user/avatar/anonymous.jpg')" class="avatar-img"></i>
                        </div>
                        <div class="author-info inline-block">
                            <a href="javascript:;"><strong class="author-nickname inline-block">Heanes</strong></a>
                            <p class="author-about">津乐网创始人，一个全栈爱好者</p>
                            <p class="author-description">喜欢各种技术</p>
                            <p class="author-links">
                                <a href="javascript:;" class="donate-to-author"><i class="fa fa-coffee" aria-hidden="true"></i>  请作者喝杯咖啡?</a>
                                <span class="vertical-line-margin">|</span>
                                <a href="javascript:;">看他的专栏</a>
                                <span class="vertical-line-margin">|</span>
                                <a href="javascript:;">新浪微博</a>
                                <span class="vertical-line-margin">|</span>
                                <a href="javascript:;">邮箱</a>
                            </p>
                        </div>
                        <div class="article-author-info-title absolute">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            <span>关于本文的作者</span>
                        </div>
                    </div>
                    <!-- 文章相关信息 -->
                    <div class="article-meta">
                        <dl class="meta-define-list">
                            <dt>本文分类：</dt>
                            <?php foreach ($output['data']['articleCategoryTree'] as $item){?>
                                    <dd><a href="<?php echo $item['url'];?>"><?php echo $item['name'];?></a></dd>
                                <?php if($key == count($output['data']['articleCategoryTree'])){?>
                                    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <?php } ?>
                            <?php } ?>
                        </dl>
                        <dl class="meta-define-list">
                            <dt>本文标签：</dt>
                            <?php foreach ($output['data']['articleTagList'] as $key => $item){?>
                                <dd><a href="<?php echo $item['url'];?>"><?php echo $item['name'];?><?php if(count($output['data']['articleTagList']) < $key){?>，<?php }?></a></dd>
                            <?php }?>
                        </dl>
                        <dl class="meta-define-list">
                            <dt>流行热度：</dt>
                            <dd>已超过 <?php echo $output['data']['clickCount'];?> 人围观了本文</dd>
                        </dl>
                        <dl class="meta-define-list">
                            <dt>生产日期：</dt>
                            <dd>异次纪元 <?php echo $output['data']['publishTimeFormativeCh'];?></dd>
                        </dl>
                        <dl class="meta-define-list">
                            <dt>文章链接：</dt>
                            <dd>
                                <strong class="url"><a href="<?php echo $output['data']['url'];?>"><?php echo $output['data']['url'];?></a></strong>
                                <span class="copy-link">[<a href="javascript:;" id="copyUrl">复制</a>]</span>
                                <span>(转载时请注明本文出处及文章链接)</span>
                            </dd>
                        </dl>
                    </div>
                    <!-- 文章相关交互 -->
                    <div class="article-handle">
                        <div class="article-vote" style="display:none;">
                            <span class="article-collect"><a href="javascript:;" class="collect-count" id="collectArticle"><i class="fa fa-star" aria-hidden="true"></i>收藏(<span id="articleCollectCount">{{article.collectCount}}</span>)</a></span>
                            <span class="article-thumbs-up"><a href="javascript:;" class="thumbs-up" id="thumbsUpArticle"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>点赞(<span id="articleThumbsUpCount">{{article.thumbsUpCount}}</span>)</a></span>
                        </div>
                        <!-- 文章分享按钮 -->
                        <div class="article-share-block">
                            <div class="share-title">
                                <span class="share-title-text">分享给小伙伴</span>
                            </div>
                            <!-- 百度分享 -->
                            <div class="bdsharebuttonbox">
                                <a href="#" class="bds_more" data-cmd="more"></a>
                                <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                                <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣"></a>
                                <a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
                                <a class="bds_more" data-cmd="more"></a>
                                <!--<a class="bds_count" data-cmd="count"></a>-->
                            </div>
                            <script>
                                window._bd_share_config = {
                                    "common": {"bdSnsKey": {},"bdText": "","bdMini": "2","bdMiniList": false,"bdPic": "","bdStyle": "0","bdSize": "24"},
                                    "share": {}
                                };
                                with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src =
                                    '//sharebaidu.heanes.com/static/api/js/share.js?v=89860593.js?cdnversion']; //=' + ~(-new Date() / 36e5)];
                            </script>
                        </div>
                    </div>
                    <!-- 评论区域 -->
                    <div class="article-comment-block" id="comment">
                        <div class="add-comment-block">
                            <h1 class="add-comment-title"><a id="add-comment">发表评论</a></h1>
                            <p class="add-comment-remind">愿您的每句评论，都能给大家的生活添色彩，带来共鸣，带来思索，带来快乐。</p>
                            <div class="add-comment">
                                <form class="comment-add-form" id="commentAddForm">
                                    <div class="input-group inline">
                                        <label for="userName"><span class="must">*</span>姓名：</label>
                                        <input type="text" name="userName" id="userName" />
                                    </div>
                                    <div class="input-group inline">
                                        <label for="email"><span class="must">*</span>E-Mail：</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="input-group inline">
                                        <label for="website">你的网站：</label>
                                        <input type="text" name="website" id="website" />
                                    </div>
                                    <div class="input-group">
                                        <label for="commentContent"></label>
                                        <textarea name="commentContent" id="commentContent" class="comment-textarea"></textarea>
                                    </div>
                                    <div class="add-comment-handle">
                                        <input type="submit" class="btn submit-button button-normal" id="commentAddSubmit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 右侧区域 -->
    <div class="right-block right-wrap fl">
        <div class="right-content">
            <!-- 文章目录导航 -->
            <div class="side-content" id="articleCatalog"></div>
        </div>
    </div>
</div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript" src="//r.html.heanes.com/work/heanes.com/autoCatalog.js/js/autoCatalog.js"></script>
    <script type="text/javascript">
        $(function () {
            var API = {
                // 文章列表
                'articleList':'/api/article/list',
                // 文章详情
                'articleDetail':'/api/article/detail',
                // 文章点击数更新
                'articleClickCountUpdate':'/api/article/updateClickCount',
                // 文章评论列表
                'articleCommentList':'/api/articleComment/list',
                // 添加文章评论
                'articleCommentAdd':'/api/articleComment/add',
                // 添加文章收藏
                'articleCollectAdd':'/api/articleCollect/add',
                // 文章点赞
                'articleThumbsUpAdd':'/api/articleThumbsUp/add'
            };

            var $articleContent = $('#articleContent');
            /**
             * @doc 仿百度百科自动生成文章目录导航
             * @author Heanes
             * @time 2016-04-13 18:07:26
             */
            $articleContent.autoCatalog({
                catalogContainer: $('#articleCatalog'),        // 放置生成目录的容器dom
                step:90,
                alwaysShow:true
            });

            // @todo 文章关键词
            // @todo 相关文章算法

            /**
             * @doc 添加文章评论
             * @author Heanes
             * @time 2016-07-07 17:56:10 周四
             */
            var $commentAddForm = $('#commentAddForm');
            var $commentAddSubmit = $('#commentAddSubmit');
            $commentAddSubmit.on('click', function () {
                var $commentAddContent = $commentAddForm.find('textarea[name="commentAddContent"]');
                var commentAddContent = $commentAddContent.val();
                if(commentAddContent === ''){
                    alert('请输入文字');
                    return false;
                }
                var commentData = {};
                $.ajax({
                    url: API.articleCommentAdd,
                    method:'POST',
                    data: {'id': <?php echo $output['id'];?>, commentData: commentData},
                    dataType: "json",
                    success: function (result) {
                        if(result.success){
                            //@todo 评论成功，ajax刷新评论列表，并将刚刚评论的添加到顶部
                        }else{
                            alert('非常抱歉，操作失败，请稍后再试');
                        }
                    },
                    fail: function (result) {
                        alert('非常抱歉，操作失败，请稍后再试');
                    }
                });
            });

            /**
             * @doc 收藏文章操作
             * @author Heanes
             * @time 2016-07-13 18:11:57
             */
            $('#collectArticle').on('click', function () {
                $.ajax({
                    url: API.articleCollectAdd,
                    method:'POST',
                    data: {'id': <?php echo $output['id'];?>},
                    dataType: "json",
                    success: function (result) {
                        if(result.success){
                            var $articleCollectCount = $('#articleCollectCount');
                            $articleCollectCount.text(parseInt($articleCollectCount.text()) + 1);
                        }else{
                            alert('操作失败!');
                        }
                    },
                    fail: function (result) {
                        alert('操作失败!');
                    }
                });
            });

            /**
             * @doc 文章点赞操作
             * @author Heanes
             * @time 2016-07-14 11:03:09
             */
            $('#thumbsUpArticle').on('click', function () {
                $.ajax({
                    url: API.articleThumbsUpAdd,
                    method:'POST',
                    data: {'id': <?php echo $output['id'];?>},
                    dataType: "json",
                    success: function (result) {
                        if(result.success){
                            var $articleThumbsUpCount = $('#articleThumbsUpCount');
                            $articleThumbsUpCount.text(parseInt($articleThumbsUpCount.text()) + 1);
                            // 或者获取实时点赞数
                        }else{
                            alert('操作失败!');
                        }
                    },
                    fail: function (result) {
                        alert('操作失败!');
                    }
                });
            });

        });
    </script>
    <!-- E js E -->
</cite>
