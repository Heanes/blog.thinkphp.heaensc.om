<?php
/**
 * @doc 公共头部
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 12:21:26 周二
 */
defined('inHeanes') or die('Access denied!');
?>
<div class="header">
    <!-- 顶部操作/导航/工具栏 -->
    <div class="top-toolbar">
        <div class="main-wrap clearfix relative">
            <div class="top-menu"></div>
            <!-- 顶部右侧工具栏 -->
            <div class="top-handle-block">
                <div class="handle-block hover-change-block font-setting">
                    <div class="handle-content front">
                        <a class="handle handle-icon">字体设置</a>
                    </div>
                    <div class="handle-content backend">
                        <span class="text-songti" id="textSongti">宋体</span>
                        <span class="test-yahei" id="textYahei">微软雅黑</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 顶部导航栏 -->
    <div class="header-nav-bar" id="headerNavBar">
        <div class="main-wrap clearfix">
            <!-- 头部logo区域 -->
            <div class="header-logo">
                <a href="javascript:" class="logo-a">
                    <img src="<?php echo TPL;?>/image/common/logo.png">
                </a>
            </div>
            <!-- 头部导航菜单区域 -->
            <div class="header-nav">
                <ul class="nav" id="navigationList">
                    <?php foreach ($output['common']['navigationList'] as $key => $navigation){?>
                    <li>
                        <a href="{$navigation.aHref}" class="nav-a {$navigation.styleClass}">
                            <i class="{$navigation.iconClass}"></i>
                            <span>{$navigation.name}</span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <!-- 搜索区域 -->
            <div class="header-search">
                <input type="text" class="search-input" placeholder="搜索一下，什么都木有~" >
                <a href="javascript:" class="search-a-submit"><i class="icon-search fa fa-search"></i></a>
            </div>
        </div>
    </div>
    <div class="header-nav-bar-placeholder" id="headerNavBarPlaceholder"></div>
</div>
