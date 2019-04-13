<?php
/**
 * @doc 导航菜单相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-30 15:44:37 周四
 */
namespace Api\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Service\NavigationService;

class NavigationController extends BaseAPIController {

    /**
     * @var NavigationService 导航模型
     */
    private $navigationService;

    function __construct() {
        parent::__construct();
        $this->navigationService = new NavigationService();
    }

    /**
     * @doc 默认方法，转到列表方法
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:33 周二
     */
    public function indexOp() {
        $this->listOp();
    }

    /**
     * @doc 列表页
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     */
    public function listOp(){
        $navigationListSR = $this->navigationService->getListForWeb();
        return returnJson($navigationListSR);
    }
}