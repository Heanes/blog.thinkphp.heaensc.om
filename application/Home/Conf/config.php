<?php
return array(
    'default_module' => 'Index',            // 默认模块
    'url_model' => '2',                     // URL模式
    'url_html_suffix' => 'html',            // 默认后缀
    'session_auto_start' => true,           // 是否开启 session
    'action_suffix' => 'Op',                // 方法后缀
    'tmpl_template_suffix' => '.tpl.php',   // 模版文件默认文件后缀名
    'default_theme' => 'default',           // 默认模版名
    'layout_on' => true,                    // 开启布局
    'layout_name' => 'layout/layoutCommon', // 默认布局名称

    'load_ext_config' => 'router.config,defaultCommonConstants',  // 额外配置
);