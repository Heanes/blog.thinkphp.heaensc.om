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
        .header-nav-bar.nav-fix{position:inherit;}
    </style>
    <title>{{article.title + ' - '}}文章详情}</title>
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
                                    <span class="op-to-small-text" id="opToSmallTextBtn">A</span>
                                    <span class="op-to-large-text" id="opToLargeTextBtn">A</span>
                                    <span class="op-share-btn"><i class="fa fa-share-alt"></i></span>
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
                        <!-- 文章相关交互 -->
                        <div class="article-handle">
                            <div class="article-vote">
                                <span><a href="" class="count-read-num">阅读数({{article.readCount}})</a></span>
                                <i class="border-separate"></i>
                                <span><a href="" class="vote-up">点赞({{article.thumbsUpCount}})</a></span>
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
                                    <form action="" method="post">
                                        <textarea rows="8" class="comment-textarea"></textarea>
                                        <div class="add-comment-handle">
                                            <input type="submit" class="submit-button button-normal" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="comment-list">
                                <h3 class="comment-list-title"><a id="comment-list">评论列表</a></h3>
                                <ul class="comment-list-ul">
                                    <li>
                                        <div class="comment-info">
                                            <span class="comment-floor"><a id="comment-floor-4" class="comment-floor-a">4楼</a></span>
                                            <span class="comment-user-name"><a href="" class="user-name-a">蒲常莹</a></span>
                                            <span class="comment-user-ip">北京海淀</span>
                                            <span>2015-05-19 17:26:28</span>
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
    <script type="text/javascript">
        $(function () {
            var API = {
                'articleList':'/api/article/list',
                'articleDetail':'/api/article/detail'
            };

            var rootUrl = window.location.origin;
            var queryUrl = rootUrl + '/api' + window.location.pathname;
            $.ajax({
                url: queryUrl,
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
            // @todo 点击一次文章点击数更新
            // @todo 文章关键词
            // @todo 相关文章算法
            // @todo 文章评论

        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>
