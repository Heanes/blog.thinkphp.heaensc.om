<?php
/**
 * @doc 文章详情
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:49 周二
 */
defined('inHeanes') or die('Access denied!');
?>

<!DOCTYPE html>
<html lang="zh-cmn-Hans" id="articleDetailHtml">
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
    <link rel="stylesheet" type="text/css" href="/public/static/libs/js/autoCatalog/1.0/css/autoCatalog.css">
    <style>
        .header-nav-bar.nav-fix{position:inherit;height:80px;}
        .header-nav-bar-placeholder{display:none !important;}
    </style>
    <title>{{article.title + ' - '}}文章详情</title>
</head>
<body>
<div class="center wrap clearfix">
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
                <div class="page-content">
                    <div class="article-page">
                        <!-- 文章分类 -->
                        <div class="article-category">
                            <a href="">首页</a>
                            <span class="nav-sub"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <a href="">资讯</a>
                            <span class="nav-sub"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <a href="">网络</a>
                        </div>
                        <!-- 单篇文章 -->
                        <div class="article-block">
                            <div class="article-title-block">
                                <!-- 文章标题 -->
                                <div class="article-title">
                                    <h1 class="entry-title">{{article.title}}</h1>
                                </div>
                                <!-- 文章相关属性信息 -->
                                <div class="article-info">
                                    <p>
                                        人气：{{article.clickCount}} <a href="#comment-list" class="comment-num">评论：{{article.commentNum}}</a>
                                        作者：{{article.author}} 责编：{{article.editor}}
                                        {{article.publishTimeFormative}} 来源：{{article.originSource}}
                                    </p>
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
                            <div class="article-content" id="articleContent">{{{article.content}}}</div>
                            <div class="article-meta">
                                <p class="article-tags">本文关键词：<strong><a href="">漫画</a></strong>，<strong><a href="">友情</a></strong></p>
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
                                <dd><a href="javascript:;">闲言碎语</a></dd>
                            </dl>
                            <dl class="meta-define-list">
                                <dt>本文标签：</dt>
                                <dd><a href="javascript:;">漫画</a></dd>
                                <dd>，<a href="javascript:;">友谊</a></dd>
                                <dd>，<a href="javascript:;">网络</a></dd>
                            </dl>
                            <dl class="meta-define-list">
                                <dt>流行热度：</dt>
                                <dd>已超过 6,998 人围观了本文</dd>
                            </dl>
                            <dl class="meta-define-list">
                                <dt>生产日期：</dt>
                                <dd>异次纪元 16年07月8日 - 21时36分08秒</dd>
                            </dl>
                            <dl class="meta-define-list">
                                <dt>文章链接：</dt>
                                <dd>
                                    <strong class="url">http://blog.heanes.com/article/1.html</strong>
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
                                    <a class="bds_count" data-cmd="count"></a>
                                </div>
                                <script>
                                    window._bd_share_config = {
                                        "common": {"bdSnsKey": {},"bdText": "","bdMini": "2","bdMiniList": false,"bdPic": "","bdStyle": "0","bdSize": "24"},
                                        "share": {}
                                    };
                                    with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src =
                                        'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
                                </script>
                            </div>
                        </div>
                        <!-- 前后文章 -->
                        <div class="article-preview-forward">
                            <p>» 上一条：没有啦！</p>
                            <p>» 下一条：<a href="/news/show-444.html">大学毕业季，校园学生搬家怎么办？</a></p>
                        </div>
                        <!-- 相关文章 -->
                        <div class="article-relate-block">
                            <div class="article-relate-text">
                                <h1 class="relate-title"><a id="relate-article">相关文章</a></h1>
                                <ul class="relate-text-ul">
                                    <li>
                                        <a href="" class="relate-li-a">腾讯旗下微众银行推出首款小额贷款产品“微粒贷”</a>
                                    </li>
                                    <li>
                                        <a href="" class="relate-li-a">腾讯旗下微众银行推出首款小额贷款产品“微粒贷”</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-relate-img">
                                <ul>
                                    <li></li>
                                    <li></li>
                                </ul>
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
                                            <label for="userName">姓名：</label>
                                            <input type="text" name="userName" id="userName" />
                                        </div>
                                        <div class="input-group inline">
                                            <label for="email">E-Mail：</label>
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
                                            <input type="submit" class="submit-button button-normal" id="commentAddSubmit" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="comment-list">
                                <h3 class="comment-list-title"><a id="comment-list">评论列表</a></h3>
                                <ul class="comment-list-ul" id="commentList">
                                    <li v-if="articleCommentList && articleCommentList.length > 0" v-for="articleComment in articleCommentList">
                                        <div class="comment-info">
                                            <span class="comment-user-avatar"><i class="user-avatar" style="background-image:url('<?php echo TPL;?>/image/user/avatar/anonymous.jpg')"></i></span>
                                            <span class="comment-user-name"><a href="" class="user-name-a">蒲常莹</a></span>
                                            <span class="comment-user-ip">北京海淀</span>
                                            <span>2015-05-19 17:26:28</span>
                                            <span class="comment-floor"><a id="comment-floor-4" class="comment-floor-a">4楼</a></span>
                                        </div>
                                        <div class="comment-content">
                                            <p>楼下的一看就是小白。阿里微贷的1年利息接近10%。是工行的2倍，至于广发 平安更是高达17%-20%</p>
                                        </div>
                                        <div class="comment-handle">
                                            <span class="comment-complain"><a href="">举报</a></span>
                                            <i class="border-separate"></i>
                                            <span class="comment-vote-up"><a href="">支持(46)</a></span>
                                            <i class="border-separate"></i>
                                            <span class="comment-vote-down"><a href="">反对(0)</a></span>
                                            <i class="border-separate"></i>
                                            <span class="comment-reply"><a href="">回复</a></span>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <li v-if="articleCommentList == undefined">
                                        <div class="no-data">
                                            <p>暂无评论</p>
                                        </div>
                                    </li>
                                    <li class="get-data-error" id="getCommentListDataError">
                                        <div class="no-data">
                                            <p>获取文章评论失败</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap float-block">
                <!-- 文章目录导航 -->
                <div class="side-content" id="articleCatalog"></div>
                <!-- 右侧钉住样式 -->
                <div class="right-fix-block">
                    <div class="right-corner">
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-angle-down" aria-hidden="true" style="font-size:54px;padding-top:5px;"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon go-to-bottom">去底部</a>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon go-to-home" href="/">回首页</a>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon refresh" onclick="window.location.reload();">刷新</a>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block" id="goToArticleCommentBtn">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-comments-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon comment" href="#comment">评论</a>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon share">分享</a>
                            </div>
                            <div class="hover-change-content qr-code-content">
                                <!-- 百度分享 -->
                                <div class="bdsharebuttonbox" style="width:72px;background-color:#fff;padding-left:10px;">
                                    <a href="#" class="bds_more" data-cmd="more"></a>
                                    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                                    <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣"></a>
                                    <a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
                                    <a class="bds_more" data-cmd="more"></a>
                                    <a class="bds_count" data-cmd="count"></a>
                                </div>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-qrcode" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon qr-code">二维码</a>
                            </div>
                            <div class="hover-change-content qr-code-content">
                                <img src="<?php echo TPL?>/image/rightFixCorner/style1/qr-150.png">
                            </div>
                        </div>
                        <!-- 关灯（背景黑） -->
                        <div class="handle-block hover-change-block none">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon turn-off-light">关灯</a>
                            </div>
                        </div>
                        <div class="handle-block hover-change-block">
                            <div class="handle-content front">
                                <a class="handle handle-icon"><i class="fa fa-angle-up" aria-hidden="true" style="font-size:54px;padding-top:0"></i></a>
                            </div>
                            <div class="handle-content backend">
                                <a class="handle handle-icon go-to-top">回顶部</a>
                            </div>
                        </div>
                        <div class="handle-block decorate-cat">
                            <div class="handle-content front" id="rightFixLittleCat">
                                <img src="<?php echo TPL?>/image/footer/other/little-cat.png"/>
                            </div>
                        </div>
                    </div>
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
    <script type="text/javascript" src="/public/static/libs/js/autoCatalog/1.0/js/autoCatalog.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/mvvm/vue/js.js"></script>
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

            var rootUrl = window.location.origin;
            var queryUrlDetail = rootUrl + '/api' + window.location.pathname;
            var queryUrlClickCountUpdate = API.articleClickCountUpdate;
            $.ajax({
                url: queryUrlDetail,
                method:'POST',
                data: {'id': <?php echo $bData['id'];?>},
                dataType: "json",
                success: function (result) {
                    var articleDetail = new Vue({
                        el: '#articleDetailHtml',
                        data: {
                            article: result.body
                        },
                        ready: function () {
                            var $articleContent = $('#articleContent');
                            /**
                             * @doc 仿百度百科自动生成文章目录导航
                             * @author Heanes
                             * @time 2016-04-13 18:07:26
                             */
                            $articleContent.autoCatalog({
                                step: 90,
                                alwaysShow: true
                            });
                        }
                    });
                },
                fail: function (result) {
                }
            });
            /**
             * @doc 点击一次文章点击数更新
             * @author Heanes
             * @time 2016-07-07 17:16:59 周四
             */
            $.ajax({
                url: queryUrlClickCountUpdate,
                method:'POST',
                data: {'id': <?php echo $bData['id'];?>},
                dataType: "json",
                success: function (result) {
                    //;
                },
                fail: function (result) {
                    console.warn('文章点击数更新错误!');
                }
            });
            // @todo 文章关键词
            // @todo 相关文章算法
            /**
             * @doc 获取文章评论
             * @author Heanes
             * @time 2016-07-07 17:37:09 周四
             */
            $.ajax({
                url: API.articleCommentList,
                method:'POST',
                data: {'id': <?php echo $bData['id'];?>},
                dataType: "json",
                success: function (result) {
                    if(result.success){
                        var articleCommentList = new Vue({
                            el: '#commentList',
                            data: {
                                articleCommentList: result.body
                            }
                        });
                    }else{
                        $('#getCommentListDataError').show();
                    }
                },
                fail: function (result) {
                    $('#getCommentListDataError').show();
                }
            });

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
                if(commentAddContent == ''){
                    alert('请输入文字');
                    return false;
                }
                var commentData = {};
                $.ajax({
                    url: API.articleCommentAdd,
                    method:'POST',
                    data: {'id': <?php echo $bData['id'];?>},
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
                    data: {'id': <?php echo $bData['id'];?>},
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
                    data: {'id': <?php echo $bData['id'];?>},
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
</body>
</html>
