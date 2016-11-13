<?php
return array(
    //'配置项' => '配置值'

    // 允许访问的模块
    'module_allow_list' => array('Home','Admin','api'),

    // 额外配置
    'load_ext_config'   => 'db.config,defaultCommonConstants,log.config,router.config,template.config',

);