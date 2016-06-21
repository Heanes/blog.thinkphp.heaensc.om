<?php
return array(
	//'配置项'=>'配置值'
    'module_allow_list' => array('Home','Admin','api'),

    // 数据库
    'db_type'   => 'mysqli',                // 数据库类型
    'db_host'   => 'localhost',             // 服务器地址
    'db_name'   => 'heanes.com',            // 数据库名
    'db_user'   => 'webdb',                 // 用户名
    'db_pwd'    => 'p()P]aHqCEfwVY@7',      // 密码
    'db_port'   => 3306,                    // 端口
    'db_prefix' => 'pre_',                  // 数据库表前缀
    'db_charset'=> 'utf8',                  // 字符集
    'db_debug'  =>  true,                   // 数据库调试模式 开启后可以记录sql日志 3.2.3新增
);