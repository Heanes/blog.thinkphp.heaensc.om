<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:55:09 周二
 */
namespace Api\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleCategoryController extends BaseAPIController {

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;


    function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
        $this->articleCategoryModel = new ArticleCategoryModel();
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
        $articleCategoryListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit('0,20')
            ->select();
        $articleCategoryListCamelStyle = convertToCamelStyle($articleCategoryListRaw);
        $result = [
            'body' => $articleCategoryListCamelStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 获取文章详情
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 18:15:42 周二
     */
    public function detailOp() {
        $result = [
            'body' => [],
            'message' => '',
            'errorCode' => -1,
            'success' => false
        ];
        if(!isset($_REQUEST['code']) && !isset($_REQUEST['id'])){
            $result['message'] = '缺少参数，id或code不能为空';
            $result['errorCode'] = '1003';
            returnJson($result);
            return null;
        }
        $articleCategoryWhereStr = '';
        if(isset($_REQUEST['code'])){
            $code = $_REQUEST['code'];
            $articleCategory = $this->articleCategoryModel
                ->where('code = '. $code .' and is_enable = 1 and is_deleted = 0')
                ->find();
            $articleCategoryWhereStr = ' category_id = ' . $articleCategory['id'];
        }
        if(isset($_REQUEST['id'])){
            $code = $_REQUEST['id'];
            $articleCategory = $this->articleCategoryModel
                ->where('id = '. $code .' and is_enable = 1 and is_deleted = 0')
                ->find();
            $articleCategoryWhereStr = ' category_id = ' . $articleCategory['id'];
        }
        $articleListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0' . $articleCategoryWhereStr)
            ->limit('0,20')
            ->select();
        $articleListCamelStyle = convertToCamelStyle($articleListRaw);
        $result['body'] = $articleListCamelStyle;
        returnJson($result);
    }

}