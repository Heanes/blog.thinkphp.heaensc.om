<?php
/**
 * @doc 前台首页控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:34:51 周二
 */
namespace Home\Controller;
class IndexController extends BaseHomeController {

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        $this->display('index');
    }

}