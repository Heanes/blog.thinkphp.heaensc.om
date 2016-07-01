<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:55:09 周二
 */
namespace Api\Controller;

use Common\Model\UserModel;

class UserController extends BaseAPIController {

    /**
     * @var UserModel 文章模型
     */
    private $userModel;

    function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
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
        $userListRaw = $this->userModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit('0,20')
            ->select();
        $userListCamelStyle = convertToCamelStyle($userListRaw);
        $result = [
            'body' => $userListCamelStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 获取用户详情
     * @author Heanes fang <heaens@163.com>
     * @time 2016-06-27 11:57:10 周一
     */
    public function detailOp() {
        $id = $_REQUEST['id'];
        if(!$id){
            returnJson('id不能为空');
        }
        $userRaw = $this->userModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->find();
        $userCamelStyle = convertToCamelStyle($userRaw);
        $result = [
            'body' => $userCamelStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }
}