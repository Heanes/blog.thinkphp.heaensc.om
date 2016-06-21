<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:55:09 周二
 */
namespace Api\Controller;

use Common\Model\ArticleModel;

class ArticleController extends BaseAPIController {

    private $articleModel;

    private $commonExceptFields = 'is_enable,is_deleted,access_password,insert_time,update_time,create_user,update_user';

    function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
    }

    /**
     * @doc 默认方法，抓到列表方法
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
        $articleListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->field($this->commonExceptFields, true)
            ->limit('0,20')
            ->select();
        returnJson($articleListRaw);
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
        $articleListRaw = $this->articleModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->field($this->commonExceptFields, true)
            ->find();
        returnJson($articleListRaw);
    }

}