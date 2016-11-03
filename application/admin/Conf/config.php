<?php
return array(
    'default_module'        => 'Index',                 // 默认模块
    'session_auto_start'    => true,                    // 是否开启 session
    'action_suffix'         => 'Op',                    // 方法后缀
    'tmpl_template_suffix'  => '.tpl.php',              // 模版文件默认文件后缀名
    'default_theme'         => 'default',               // 默认模版名
    'layout_on'             => false,                   // 开启布局
    'layout_name'           => 'layout/layoutCommon',   // 默认布局名称
    
    'load_ext_config'       => 'defaultCommonConstants,router.config',    // 额外配置
);