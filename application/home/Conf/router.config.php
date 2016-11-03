<?php
/**
 * @doc 路由配置
 * @author Heanes
 * @time 2016-09-05 16:03:07
 */
return array(
    // 路由相关
    'url_router_on'     => true,            // 开启路由
    'url_route_rules'=>array(
        // 文章路由
        'article/:id\d'=>'home/article/detail',
        'api/article/:id\d'=>'api/article/detail',
        // 文章分类路由
        'articleCategory/:code'=>'home/articleCategory/list',
    ),
);