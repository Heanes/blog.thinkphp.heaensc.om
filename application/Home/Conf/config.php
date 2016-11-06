<?php
return array(
    'default_module'        => 'Index',                 // 默认模块
    
    'session_auto_start'    => true,                    // 是否开启 session
    'action_suffix'         => 'Op',                    // 方法后缀
    
    // 额外配置
    'load_ext_config'       => 'defaultCommonConstants,router.config,template.config',
);