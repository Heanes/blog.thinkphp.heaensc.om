<?php
/**
 * @doc 路由配置
 * @author Heanes
 * @time 2016-09-05 16:03:07
 */
return array(
    // 路由相关
    'url_route_rules' => array(
        // index页面文章路由
        'p/:p\d$'                           => 'index/index',
        'index/p/:p\d$'                     => 'index/index',
        // 文章路由
        'article/index/p/:p\d$'             => 'article/index',
        'article/p/:p\d$'                   => 'article/index',
        'article/:id\d$'                    => 'index/article/detail',
        'article/:articleCategory/list$'    => 'index/article/list',
        // 文章分类路由
        'articleCategory/:id\d$'            => 'index/articleCategory/articleList',
        'articleCategory/:code\s$'          => 'index/articleCategory/articleList',
        // 文章标签路由
        'articleTag/:id\d$'                 => 'index/articleTag/articleList',
        'articleTag/:name$'                 => 'index/articleTag/articleList',

        // 文章作者路由
        'articleAuthor/:id\d$'              => 'index/articleAuthor/articleList',
        'articleAuthor/:name$'              => 'index/articleAuthor/articleList',

    ),

    'url_router_on'        => true,        // 开启路由
    'url_model'            => 2,           // URL模式
    'url_html_suffix'      => 'html',      // 默认后缀
    'url_case_insensitive' => false,       // URL区分大小写
);