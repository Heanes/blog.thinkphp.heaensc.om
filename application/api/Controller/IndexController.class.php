<?php
/**
 * @doc API默认控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:34:51 周二
 */
namespace Api\Controller;
class IndexController extends BaseAPIController {

    /**
     * @doc API默认方法
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:52:32 周二
     */
    public function indexOp(){
        echo 'api v1.0';
    }
}