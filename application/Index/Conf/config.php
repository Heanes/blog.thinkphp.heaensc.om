<?php
return array(
    'default_module'        => 'Index',                 // 默认模块
    
    'session_auto_start'    => true,                    // 是否开启 session
    'action_suffix'         => 'Op',                    // 方法后缀

    //'var_page'              => 'p',                   // 分页参数名称，默认为page，此处根据本系统的功能，动态设置
    
    // 额外配置
    'load_ext_config'       => 'defaultCommonConstants,router.config,template.config,autoLoad.config',
);