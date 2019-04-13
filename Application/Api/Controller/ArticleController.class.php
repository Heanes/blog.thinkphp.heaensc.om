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
use Common\Service\ArticleService;

class ArticleController extends BaseAPIController {

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @var ArticleService 文章服务
     */
    private $articleService;

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;


    function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
        $this->articleCategoryModel = new ArticleCategoryModel();
        $this->articleService = new ArticleService();
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
        $requestAll = getRequestParam();
        $param = [
            'page' => [
                'pageSize'=> intval($requestAll['pageSize']),
                'pageNumber'=> intval($requestAll['pageNumber'])
            ],
            'where' => [
                //'category_code' => $_REQUEST['pageSize']
            ],
            // 按发布时间，id降序
            'order' => [
                'publish_time' => 'desc',
                'id' => 'desc'
            ]
        ];

        $articleListSR = $this->articleService->getList($param);
        return returnJson($articleListSR);
    }

    /**
     * @doc 获取文章详情
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 18:15:42 周二
     */
    public function detailOp() {
        $param = getRequestParam();
        if(!$param){
            return returnJsonMessage('param不能为空', 'error');
        }
        $detailParam = [
            'id' => $param['param'],
            'semantic_link' => $param['param']
        ];
        $articleDetailResult = $this->articleService->getDetailByParam($detailParam);
        $result = [
            'data' => null,
            'msg' => 'ok',
            'code' => 0,
            'responseDateTime' => 0,
        ];
        if($articleDetailResult){
            $dateTimeStr = '';
            try {
                $dateTime = new \DateTime();
                $dateTimeStr = $dateTime->format('Y-m-d H:i:s');
            } catch (\Exception $e) {
                ;
            }
            $result['data'] = $articleDetailResult;
            $result['responseDateTime'] = $dateTimeStr;
        }

        return returnJson($result);
    }

    /**
     * @doc 更新文章点击数
     * @author Heanes fang <heanes@163.com>
     * @time 2016-07-07 16:53:09 周四
     */
    public function updateClickCountOp() {
        $id = $_REQUEST['id'];
        if(!$id){
            returnJsonMessage('id不能为空', 'error');
        }
        $updateResult = $this->articleModel
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->setInc('click_count');
        if($updateResult == 1){
            returnJsonMessage('点击数更新成功');
        }else{
            returnJsonMessage('点击数更新成功', 'error');
        }
    }

}