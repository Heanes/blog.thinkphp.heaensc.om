<?php
/**
 * @doc 数据库配置
 * @author Heanes
 * @time 2016-09-05 15:49:56
 */
return array(
    // 数据库
    'db_type'   => 'mysqli',                    // 数据库类型
    'db_host'   => '127.0.0.1',                 // 服务器地址
    'db_name'   => 'blog.heanes.com',           // 数据库名
    'db_user'   => 'web_user_blog.heanes.com',  // 用户名
    'db_pwd'    => 'p()P]aHqCEfwVY@7',          // 密码
    'db_port'   => 3306,                        // 端口
    'db_prefix' => 'pre_',                      // 数据库表前缀
    'db_charset'=> 'utf8',                      // 字符集
    'db_debug'  =>  true,                       // 数据库调试模式 开启后可以记录sql日志 3.2.3新增
);