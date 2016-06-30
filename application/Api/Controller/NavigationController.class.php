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
        $navigationListHumpStyle = convertToHumpStyle($navigationListRaw);
        $result = [
            'body' => $navigationListHumpStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 获取文章详情
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
        $navigationHumpStyle = convertToHumpStyle($navigationRaw);
        $result = [
            'body' => $navigationHumpStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }
}