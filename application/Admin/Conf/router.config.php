<?php
/**
 * @doc 路由相关
 * @author Heanes
 * @time 2016年11月03日23:52:47
 */
return array(
    // 路由相关
    'url_route_rules'   =>array(
        // 登录
        '/^login$/' => 'index/login',
        '/^doLogin$/' => 'index/doLogin',
        // 登出

        // 文章 - 编辑
        'article/edit/:id\d$'                 => 'admin/article/edit',
    ),
    'url_router_on'        => true,        // 开启路由
    'url_model'            => 2,           // URL模式
    'url_html_suffix'      => 'html',      // 默认后缀
    'url_case_insensitive' => false,       // URL区分大小写
);