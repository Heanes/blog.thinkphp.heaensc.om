<?php
return array(
    //'配置项' => '配置值'

    // 允许访问的模块
    'module_allow_list' => array('Index','Admin','api'),
    'default_module'    => 'Index', // 默认模块

    'session_auto_start'    => true,                    // 是否开启 session
    'action_suffix'         => 'Op',                    // 方法后缀

    // 额外配置
    'load_ext_config'   => 'db.config,defaultCommonConstants,log.config,router.config,template.config,page.config',

);