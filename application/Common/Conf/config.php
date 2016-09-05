<?php
$dbConfig = require_once 'db.config.php';
$logConfig = require_once 'log.config.php';
$routerConfig = require_once 'router.config.php';
return array_merge($routerConfig, $logConfig, $dbConfig, array(
	//'配置项'=>'配置值'

    // 允许访问的模块
    'module_allow_list' => array('Home','Admin','Api'),

));