<?php
/**
 * @doc 前台模块公共控制器部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 13:34:51 周二
 */
namespace Home\Controller;
use Think\Controller;
class BaseHomeController extends Controller{

    function __construct() {
        parent::__construct();
        // 获取主题
        $this->getTheme();
    }

    /**
     * @doc 获取数据库设置的主题功能
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:04:16 周二
     */
    public function getTheme() {
        define('TPL', '/application/home/view/default');
    }

    /**
     * @doc 获取导航数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getNavigation() {
        ;
    }

    /**
     * @doc 获取友情链接
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:18:33 周二
     */
    public function getFriendlyLink() {
        ;
    }

}