<?php
/**
 * @doc 路由相关
 * @author Heanes
 * @time 2016年11月03日23:52:47
 */
return array(
    // 路由相关
    'url_route_rules'   =>array(
        '/^login$/' => 'adminUser/login',
        '/^doLogin$/' => 'adminUser/doLogin',
    ),
    'url_router_on'        => true,        // 开启路由
    'url_model'            => 2,           // URL模式
    'url_html_suffix'      => 'html',      // 默认后缀
    'url_case_insensitive' => true,       // URL区分大小写
);