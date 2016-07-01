<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:55:09 周二
 */
namespace Api\Controller;
defined('inHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleController extends BaseAPIController {

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @var ArticleModel 文章分类模型
     */
    private $articleCategoryModel;


    function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
        $this->articleCategoryModel = new ArticleCategoryModel();
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
        $articleListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit('0,20')
            ->select();
        $articleListHumpStyle = convertToCamelStyle($articleListRaw);
        $result = [
            'body' => $articleListHumpStyle,
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
        $articleRaw = $this->articleModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->find();
        $articleHumpStyle = convertToCamelStyle($articleRaw);
        $result = [
            'body' => $articleHumpStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

}