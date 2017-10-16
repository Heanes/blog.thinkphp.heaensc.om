<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
    <meta name="renderer" content="webkit"><!-- 让360等多核模式浏览器默认用极速模式打开 -->
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)">
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes">
    <meta name="description" content="描述">
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/public/static/libs/js/jQWidgets/4.4.0/styles/jqx.base.css">
    <link rel="stylesheet" type="text/css" href="/public/static/libs/js/jQWidgets/4.4.0/styles/jqx.bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="//ui.heanes.com/dist/css/heanesUI.css"/>
    <link rel="stylesheet" type="text/css" href="//r.html.heanes.com/work/heanes.com/treeView.js/css/treeView.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/css.css"/>
    <title><?php echo $output['title'].$output['common']['titleCommonSuffix'];?></title>
</head>
<body>
<div class="center wrap layout">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 后台布局的相关处理 -->
        <div class="layout-handle">
            <a href="javascript:;" id="fullScreen" class="handle" title="全屏"><i class="fa fa-arrows-alt layout-handle-icon"></i></a>
        </div>
        <!-- 顶部全宽度内容区域 -->
        <div class="main-top-block">
            <div class="header clearfix">
                <div class="admin-logo left-width">
                    <a href="/admin/" class="admin-log-href" id="homeStartHref" target="iframeRightContent">
                        <!--<i class="fa fa-gears admin-icon" aria-hidden="true"></i>-->
                        <img src="<?php echo TPL;?>/image/logo/logo.png" class="admin-icon" />
                        <span class="admin-title-text">管理后台<em class="system-version">v1.0</em></span>
                    </a>
                    <!-- 折叠左侧菜单 -->
                    <a href="javascript:;" class="lap-handle left-menu-lap-handle" id="lapLeftMenu" title="收缩/展开左侧菜单">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu-top">
                </div>
                <div class="admin-select-city">
                    <select class="select-city">
                        <option value="1">北京</option>
                        <option value="2">天津</option>
                        <option value="3">山西</option>
                        <option value="4">黑龙江</option>
                        <option value="5">吉林</option>
                        <option value="6">辽宁</option>
                        <option value="7">内蒙古</option>
                        <option value="8">广东</option>
                        <option value="9">广西</option>
                        <option value="10">福建</option>
                        <option value="11">海南</option>
                        <option value="11">湖北</option>
                        <option value="11">湖南</option>
                        <option value="11">河南</option>
                    </select>
                </div>
                <div class="admin-user-info toggle-show">
                    <div class="user-info">
                        <span class="user-name">方刚</span>
                        <span class="user-role">超级管理员</span>
                    </div>
                    <div class="toggle-show-info-block">
                        <div class="user-detail">
                            <dl>
                                <dt class="field">用户ID:</dt>
                                <dd class="value">01831</dd>
                            </dl>
                            <dl>
                                <dt class="field">电话:</dt>
                                <dd class="value">15010691715</dd>
                            </dl>
                            <dl>
                                <dt class="field">最后登录:</dt>
                                <dd class="value">2016-12-12 11:06:12 周一</dd>
                            </dl>
                        </div>
                        <div class="login-handle">
                            <a href="#" class="login-out"><i class="fa fa-power-off icon"></i>退出登录</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 左侧区域 -->
            <div class="left-block left-wrap left-width scrollbar scrollbar-mini"></div>
            <!-- 中心区域 -->
            <div class="center-block center-wrap iframe-container">
                <!-- tabs相关操作 -->
                <div class="tabs-handle">
                    <a href="javascript:;" id="refreshTab" class="handle" title="刷新标签"><i class="fa fa-refresh"></i></a>
                    <a href="javascript:;" id="closeAllTabs" class="handle" title="关闭全部标签"><i class="fa fa-close"></i></a>
                </div>
                <div class="tabs-container" id="tabsContainer">
                    <ul class="tab-title-container" id="tabsTitleContainer">
                        <li>
                            <div class="tab-title-wrap">
                                <i class="tab-title-icon fa fa-home" aria-hidden="true"></i>
                                <span class="tab-title-text">首页</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <iframe src="start.html"></iframe>
                    </div>
                </div>
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap"></div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap"></div>
        <!-- 底部全宽度内容区域 -->
        <div class="main-bottom-block"></div>
    </div>
    <!-- E 主要内容 E -->
</div>
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxcore.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxtabs.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jQWidgets/4.4.0/jqxbuttons.js"></script>
    <script type="text/javascript" src="//r.html.heanes.com/work/heanes.com/treeView.js/js/treeView.js"></script>
    <script type="application/javascript">
        /**
         * @doc 框架脚本
         * @author Heanes
         * @time 2016-11-29 10:16:42 周二
         */
        $(function () {
            /**
             * @doc 左侧菜单点击在tab中载入
             * @author Heanes
             * @time 2016-11-29 20:20:57 周二
             */
            var $tabsContainer = $('#tabsContainer');
            $tabsContainer.jqxTabs({
                theme: 'bootstrap',
                height: '100%',
                autoHeight: true,
                showCloseButtons: true,
                reorder: true,
                scrollPosition: 'both' // 标签太多时允许滚动
            });//.jqxTabs('hideCloseButtonAt', 0); //隐藏首页删除按钮

            var $tabsTitleContainer = $('#tabsTitleContainer');
            var tabsLength = $tabsTitleContainer.length;
            var tabsAddCount = 0;
            // tab关闭后处理
            $tabsContainer.on('removed', function (event) {
                tabsAddCount--;
            });
            var selectedTab = 0;
            $tabsContainer.on('selected', function (event){
                selectedTab = event.args.item;
            });
            // 刷新标签
            $('#refreshTab').on('click', function () {
                var tabContent = $tabsContainer.jqxTabs('getContentAt', selectedTab);
                var $tabIframe = $(tabContent).find('iframe').first();
                $tabIframe.attr('src', $tabIframe.attr('src'));
            });
            // 关闭全部标签
            $('#closeAllTabs').on('click', function () {
                if(confirm('你确定关闭全部标签吗？')){
                    var tabsCount = tabsAddCount;
                    for(tabsCount; tabsCount >= 0; tabsCount--){
                        $tabsContainer.jqxTabs('removeAt', tabsCount);
                    }
                }
            });

            /**
             * @doc a标签点击后添加新的tab（覆写的简便方法）
             * @param $aNode a标签jQuery对象
             * @returns {boolean}
             */
            function addJqxTabFromANode($aNode){
                var placeIndex = tabsLength + tabsAddCount;
                addJqxTabFromANodeAtIndex($aNode, $tabsContainer, placeIndex);
            }

            /**
             * @doc a标签点击后添加新的tab
             * @param $aNode a标签jQuery对象
             * @param $tabsContainer tab放置的容器
             * @param index 序号
             * @returns {boolean}
             */
            function addJqxTabFromANodeAtIndex($aNode, $tabsContainer, index){
                var tabId = 'tabsIframe' + $aNode.attr('data-nodeId');
                var tabTitleId = 'tabsTitle' + $aNode.attr('data-nodeId');
                // 查找是否已经存在此tab（支持tab头被拖动后的定位）
                var $existTabs = $tabsContainer.find('#' + tabTitleId);
                if($existTabs.length > 0){
                    // 存在则定位
                    var existIndex = $existTabs.parent().parent().index();
                    $tabsContainer.jqxTabs('select', existIndex);
                    return false;
                }
                var tabTitle = $aNode.html();
                var $tabTitleWrap = '<div class="tab-title-wrap" id="' + tabTitleId + '">' + tabTitle + '</div>';
                var tabSrc = $aNode.attr('href');
                if(tabSrc == undefined || tabSrc == '' || tabSrc == 'javascript:;' || tabSrc == 'javascript:;' || tabSrc == 'javascript:void(0)'){
                    return false;
                }
                // 否则创建
                var tabContent = '<iframe src="' + tabSrc + '" id="' + tabId + '"></iframe>';
                $tabsContainer.jqxTabs('addAt', index, $tabTitleWrap, tabContent);

                tabsAddCount++;
                return true;
            }
            /**
             * @doc 获取菜单数据
             * @author Heanes
             * @time 2016-11-29 16:40:18 周二
             */
            var getMenuData = function(){
                var menuDataJsonUrl="<?php echo TPL;?>/js/menu.json";
                $.getJSON(menuDataJsonUrl, function(data){
                    //renderMenu($menuLeftBlock, data);
                    var $treeView = $('.left-block').treeView({
                        data: data,
                        iconCollapse: 'triangle-right', // 合上时的图标
                        iconExpand: 'triangle-down',    // 展开时的图标
                        enableIndentLeft: false,        // 允许向左缩进
                        enableLink: true,               // 开启链接
                        enableTopSwitch: true,          // 开启顶部切换标识
                        showTopNavIcon: false,          // 顶部导航是否显示图标
                        topSwitcherTarget: '.menu-top', // 开启了顶部切换后，根节点展示在此处(填写jQuery选择器支持的字符)
                        showSingleNodeIcon: true,       // 无子树节点是否显示图标
                        style: {
                            topActive: {
                                bgColor: '#254f7b',     // 顶部切换的激活后背景色 topActive.bgColor
                                color: '#fff'           // 顶部切换的激活后字体色 topActive.color
                            },
                            topHover: {
                                bgColor: '#254f7b',     // 侧边树的鼠标浮上背景色 topHover.bgColor #E7E7E7
                                color: '#fff'           // 侧边树的鼠标浮上字体色 topHover.color
                            },
                            left: {
                                bgColor: '#f2f2f2',     // 侧边树的背景色 left.Bg.Color
                                color: '#353535'        // 侧边树的字体色 left.color
                            },
                            leftSelected: {
                                bgColor: '#666',        // 侧边树的选中后的背景色 leftSelected.bgColor
                                color: '#fff'           // 侧边树的选中后的字体色 leftSelected.color
                            },
                            leftHover: {
                                bgColor: '#666',        // 侧边树的鼠标浮上背景色 leftHover.bgColor
                                color: '#fff'           // 侧边树的鼠标浮上字体色 leftHover.color
                            },
                            leftNodeExpanded: {
                                bgColor: '#eee',        // 侧边树的节点展开时背景色 leftNodeExpanded.bgColor
                                color: '#353535'        // 侧边树的节点展开时字体色 leftNodeExpanded.color
                            }
                        },                              // 样式相关

                        onNodeClick: function (event, node) {
                            if(node.target && node.target == '_blank'){
                                window.open(node.href);
                                return false;
                            }
                            var $aNode = $('<a></a>').attr('href', node.href).attr('data-nodeId', node.nodeId)
                                .append('<i class="tab-title-icon ' + node.nodeIcon + '"></i>')
                                .append('<span class="tab-title">' + node.text + '</span>');
                            addJqxTabFromANode($aNode);
                            return false;
                        }
                    });

                    //@Todo url带子树路径
                    /*var hash =window.location.hash;
                    var menuHash = hash.match(/menu=(\d+|,){1,}/g);
                    var nodeIdsStr = menuHash[0].replace('menu=', '');
                    var nodeIdArr = nodeIdsStr.split(',');
                    console.log(nodeIdArr);*/


                    return data;
                });
            };
            var menuDataJson = getMenuData();


            var $leftBlock = $('.left-block');
            var $centerBlock = $('.center-block');
            /**
             * @doc 全屏的处理
             * @author Heanes
             * @time 2016-12-16 10:37:27 周五
             */
            $('#fullScreen').on('click', function () {
                var $icon = $(this).find('.fa');
                $icon.toggleClass(function() {
                    if ($icon.hasClass('fa-arrows-alt')) {
                        $icon.removeClass('fa-arrows-alt');
                        return 'fa-compress';
                    } else {
                        $icon.removeClass('fa-compress');
                        return 'fa-arrows-alt';
                    }
                });
                $(this).closest('.layout-handle').toggleClass('effected');
                $('.main-top-block').toggleClass('full-screen');
                $leftBlock.toggleClass('full-screen');
                $centerBlock.toggleClass('full-screen');
            });

            /**
             * @doc 左侧菜单缩进
             * @author Heanes
             * @time 2016-12-21 16:39:46 周三
             * @type {*}
             */
            var lapHandleClick = false;
            var $leftWith = $('.left-width');
            var leftWidth = $leftWith.css('width');
            $('#lapLeftMenu').on('click', function () {
                if(lapHandleClick){
                    $leftBlock.animate({
                        'width': leftWidth
                    });
                    $centerBlock.animate({
                        'padding-left': leftWidth
                    });
                    lapHandleClick = false;
                }else{
                    $leftBlock.animate({
                        'width': '0'
                    });
                    $centerBlock.animate({
                        'padding-left': '0'
                    });
                    lapHandleClick = true;
                }
            });

        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>