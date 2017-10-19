<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Index\Controller;
use Common\Service\ArticleCategoryService;
use Common\Service\ArticleService;
use Index\Controller\Article\ArticleWebService;
use Think\Exception;

class ArticleCategoryController extends BaseIndexController {

    use ArticleWebService;

    /**
     * @var ArticleCategoryService 文章分类模型
     */
    private $articleCategoryService;

    function __construct() {
        parent::__construct();

        $this->articleCategoryService = new ArticleCategoryService();
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
     * @doc 显示文章分类列表
     * @author Heanes <heanes@163.com>
     * @time 2016-06-21 14:45:47 周二
     */
    public function listOp() {
        $output = $this->commonOutput;
        $param = [];
        $param['where'] = $this->getCommonShowDataSelectParam();
        
        // 1.2.分页参数
        $articleParam['page'] = $this->getPageParamArray();

        // 显示文章分类列表信息
        $output['data']['article'] = $this->articleModel->listAll($param);
        $output['common']['title'] = '分类文章列表';
        $this->assign('output', $output);
        $this->display('list');
    }

    /**
     * @doc 显示文章分类详情
     * @author Heanes <heanes@163.com>
     * @time 2016-06-21 14:46:05 周二
     */
    public function detailOp() {
        // 显示公共信息相关
        $output = $this->commonOutput;
        // 文章数据
        $articleCategoryDetail = [];
        $output['data']['articleCategory'] = $articleCategoryDetail;

        $output['common']['title'] = $articleCategoryDetail['title']. ' - 文章详情';
        $this->assign('output', $output);
        $this->display('detail');
    }

    /**
     * @doc 分类详情，显示具有该分类的所有文章
     * @return $this
     * @author Heanes
     * @time 2017-09-19 13:07:24 周二
     */
    public function articleListOp() {
        // 0. 获取查询参数，id或者name
        $requestId = I('request.id', null, 'int');
        $requestCode = I('request.code', null, 'string');
        if(!isset($requestId) && !isset($requestCode)){
            $this->error('参数不对');
        }
        $output = $this->commonOutput;

        // 0.1 先查询标签自身信息
        $articleCategoryParam = $this->getCommonShowDataSelectParam();
        if(isset($requestId)){
            $articleCategoryParam['where']['id'] = $requestId;
        }
        if(isset($requestCode)){
            $articleCategoryParam['where']['name'] = $requestCode;
            $articleCategoryParam['where']['_logic'] = 'OR';
            $articleCategoryParam['where']['code'] = $requestCode;
        }
        $articleCategorySR = $this->articleCategoryService->getOne($articleCategoryParam);
        if(!$articleCategorySR){
            throw new Exception('文章分类不存在！');
        }
        // 0.2. 文章分页参数
        $articleParam['page'] = $this->getPageParamArray();
        $articleParam['where']['category_id'] = $articleCategorySR['id'];
        // 1. 查询文章列表，按发布时间降序
        $articleParam['order'] = ['publish_time desc'];
        $articlePageList = $this->getArticleList($articleParam);
        $output['data']['article'] = $articlePageList;

        $output['common']['title'] .= $articleCategorySR['name'] . ' - 文章分类';
        $this->assign('output', $output);
        $this->display('articleList');
        return $this;
    }
}