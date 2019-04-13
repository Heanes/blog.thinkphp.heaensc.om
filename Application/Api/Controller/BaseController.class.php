<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:55:09 周二
 */
namespace Api\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Base\Dto\Ret\ServiceResult;
use Common\Service\NavigationService;
use Exception;
use Think\Cache\Driver\Redis;

class BaseController extends BaseAPIController {

    /**
     * @var NavigationService 导航服务
     */
    private $navigationService;


    function __construct() {
        parent::__construct();
        $this->navigationService = new NavigationService();
    }

    /**
     * @doc 基础数据
     * @author Heanes fang <heanes@163.com>
     * @time 2019-04-05 11:55:41 周五
     */
    public function commonOp() {
        try {
            $navList = $this->getNavList();
            $data        = [
                'navList'      => $navList,
                'setting'      => [
                    'blogName' => 'Heanes的博客',
                    'createTime' => '2012-04-13 13:39:02',
                ],
                'announcement' => [],
                'friendlyLink' => [],
            ];
            $dateTimeStr = getFormateDate();

            $result      = [
                'data'         => $data,
                'msg'          => 'ok',
                'code'         => 0,
                'responseTime' => $dateTimeStr,
            ];
        } catch (Exception $e) {
            return returnJson(ServiceResult::error(1001, $e->getMessage()));
        }

        return returnJson($result);
    }

    /**
     * @doc 获取导航链接
     * @return mixed
     * @throws Exception
     * @author Heanes
     * @time 2019-04-07 10:13:22 周日
     */
    private function getNavList() {
        $navSR = $this->navigationService->getListForWeb();
        if($navSR->getCode() == 0){
            return $navSR->getData();
        }else{
            throw new Exception($navSR->getMsg());
        }
    }

}