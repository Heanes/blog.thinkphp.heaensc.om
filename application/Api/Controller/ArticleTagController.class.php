<?php
/**
 * @doc 文章部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-07 14:30:52 周四
 */
namespace Api\Controller;
defined('inHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleTagModel;

class ArticleTagController extends BaseAPIController {

    /**
     * @var ArticleTagModel 文章模型
     */
    private $articleTagModel;

    /**
     * @var ArticleModel 文章分类模型
     */
    private $articleModel;


    function __construct() {
        parent::__construct();
        $this->articleTagModel = new ArticleTagModel();
        $this->articleModel = new ArticleModel();
    }

    /**
     * @doc 默认方法，转到列表方法
     * @author Heanes fang <heanes@163.com>
     * @time 2016-07-07 14:40:39 周四
     */
    public function indexOp() {
        $this->listOp();
    }

    /**
     * @doc 列表页
     * @author Heanes fang <heanes@163.com>
     * @time 2016-07-07 14:56:27 周四
     */
    public function listOp(){
        // 不传入articleId则表示为全部文章评论列表
        $whereStr = '';
        if(isset($_REQUEST['articleId'])){
            $articleId = intval($_REQUEST['articleId']);
            $whereStr = 'article_id = '.$articleId . ' and ';
        }
        $articleTagListRaw = $this->articleTagModel
            ->where($whereStr . 'is_enable = 1 and is_deleted = 0')
            ->limit('0,20')
            ->select();
        $articleTagListCamelStyle = convertToCamelStyle($articleTagListRaw);
        $result = [
            'body' => $articleTagListCamelStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

    /**
     * @doc 获取文章评论详情
     * @author Heanes fang <heanes@163.com>
     * @time 2016-07-07 15:16:24 周四
     */
    public function detailOp() {
        $id = $_REQUEST['id'];
        if(!$id){
            returnJson('id不能为空');
        }
        $articleTagRaw = $this->articleTagModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->find();
        $articleTagCamelStyle = convertToCamelStyle($articleTagRaw);
        $result = [
            'body' => $articleTagCamelStyle,
            'message' => 'success',
            'errorCode' => 0,
            'success' => true
        ];
        returnJson($result);
    }

}