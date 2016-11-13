<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Home\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleController extends BaseHomeController {

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
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        $this->listOp();
    }

    /**
     * @doc 显示文章列表
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:45:47 周二
     */
    public function listOp() {
        $output = $this->commonOutput;
        $param = [];
        //$param['where'] = array_merge((array)$param['where'], $this->getCommonShowDataSelectParam());
        $param['where'] = $this->getCommonShowDataSelectParam();
        // 参数判断
        // 1.1.是否带有文章分类参数
        $requestArticleCategory = I('request.articleCategory', null, 'string');
        if(isset($requestArticleCategory)){
            $paramArticleCategory['where'][] = [
                'code' => $requestArticleCategory,
            ];
            $articleCategoryRaw = $this->articleCategoryModel
                ->where($paramArticleCategory['where'])
                ->find();
            if($articleCategoryRaw && $articleCategoryRaw != null && count($articleCategoryRaw)){
                $param['where'][] = [
                    'category_id' => $articleCategoryRaw['id']
                ];
                $output['common']['title'] = $articleCategoryRaw['name'];
            }
        }

        // 1.2.分页参数
        $pagePramName = $this->commonOutput['settingCommon']['request_page_param_name'] ?: REQUEST_PAGE_PARAM_NAME_DEFAULT;
        $pageSizePramName = $this->commonOutput['settingCommon']['request_page_size_param_name'] ?: REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT;
        $pageSizeDefault = $this->commonOutput['settingCommon']['data_list_page_size'] ?: DATA_LIST_PAGE_SIZE_DEFAULT;
        $pageNumber = I('request' . $pagePramName, 1, 'int');
        $pageSize = I('request' . $pageSizePramName, $pageSizeDefault, 'int');
        $page = [
            'pageNumber'    => $pageNumber,
            'pageSize'      => $pageSize,
        ];
        $param['page'] = $page;
        $output['data']['article'] = $this->articleModel->listAll($param);
        $output['common']['title'] .= ' - 文章列表';
        $this->assign('output', $output);
        $this->display('list');
    }

    /**
     * @doc 根据文章ID显示文章内容
     * @alias getDetailById
     * @author Heanes
     * @time 2016-06-21 14:46:05 周二
     */
    public function detailOp() {
        $requestId = I('request.id', null, 'int');
        if(!isset($requestId)){
            $this->error('参数不对');
        }
        $output = $this->commonOutput;
        $output['data'] = $this->articleModel->getDetailById($requestId);
        
        // TODO 更新文章相关属性，如阅读数等
        $output['common']['title'] = $output['data']['title'] . ' - 文章详情';
        $this->assign('output', $output);
        $this->display('detail');
    }
}