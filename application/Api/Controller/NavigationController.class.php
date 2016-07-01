<?php
/**
 * @doc 导航菜单相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-30 15:44:37 周四
 */
namespace Api\Controller;
defined('inHeanes') or die('Access denied!');

use Common\Model\NavigationModel;

class NavigationController extends BaseAPIController {

    /**
     * @var NavigationModel 导航模型
     */
    private $navigationModel;

    function __construct() {
        parent::__construct();
        $this->navigationModel = new NavigationModel();
    }

    /**
     * @doc 默认方法，转到列表方法
     * @author Heanes fang <heaens@163.com>
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
        $navigationListRaw = $this->navigationModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit('0,20')
            ->select();
        $navigationListHumpStyle = convertToCamelStyle($navigationListRaw);
        $result = [
            'body' => $navigationListHumpStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 获取导航详情
     * @author Heanes fang <heaens@163.com>
     * @time 2016-06-21 18:15:42 周二
     */
    public function detailOp() {
        $id = $_REQUEST['id'];
        if(!$id){
            returnJson('id不能为空');
        }
        $navigationRaw = $this->navigationModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->find();
        $navigationHumpStyle = convertToCamelStyle($navigationRaw);
        $result = [
            'body' => $navigationHumpStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 添加导航
     * @author Heanes fang <heaens@163.com>
     * @time 2016-07-01 11:24:25 周五
     */
    public function addOp() {
        $addNavigation = $_REQUEST['addNavigation'];
        $insertResult = $this->navigationModel->add($addNavigation);
        $result = [
            'body' => $insertResult,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 更新导航
     * @author Heanes fang <heaens@163.com>
     * @time 2016-07-01 10:54:43 周五
     */
    public function updateOp() {
        $updateNavigation = $_REQUEST['updateNavigation'];
        $saveResult = $this->navigationModel->save($updateNavigation);
        $result = [
            'body' => $saveResult,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 删除导航
     * @author Heanes fang <heaens@163.com>
     * @time 2016-07-01 11:27:07 周五
     */
    public function deleteOp() {
        $deleteNavigation = [
            'id' => $_REQUEST['id'],
            'is_deleted' => 1,
        ];
        $deleteResult = $this->navigationModel->save($deleteNavigation);
        $result = [
            'body' => $deleteResult,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }
}