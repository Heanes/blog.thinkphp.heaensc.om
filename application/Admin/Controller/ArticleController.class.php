<?php
/**
 * @doc 文章管理模块
 * @author Heanes <heanes@163.com>
 * @time: 2017-10-09 14:45:35 周一 在高铁上
 */
namespace Admin\Controller;

defined('InHeanes') or exit('Access Invalid!');

use Admin\Common\WebService\Article\ArticleWebService;
use Common\Service\ArticleCategoryService;
use Common\Service\ArticleService;
use Common\Service\ArticleTagService;
use Think\Page;

class ArticleController extends BaseAdminController {

    use ArticleWebService;
    
    /**
     * @var ArticleService 文章服务
     */
    private $articleService;
    
    /**
     * @var ArticleCategoryService 文章分类服务
     */
    private $articleCategoryService;

    /**
     * @var ArticleTagService 文章标签服务
     */
    private $articleTagService;

    function __construct() {
        parent::__construct();
        $this->checkLogin();
    }
    
    /**
     * @doc 文章数据[页面]
     * @author Heanes
     * @time 2016-11-06 18:31:40 周日
     */
    public function indexOp() {
        $output = $this->commonOutput;
        $articleParam['where'] = $this->getCommonShowDataSelectParam();

        // 0.2.分页参数
        $articleParam['page'] = $this->getPageParamArray();
        $articleParam['order'] = ['publish_time desc'];
        // 1. 查询数据
        $articleService = new ArticleService();
        $articlePageList = $articleService->getList($articleParam);
        // 2. 处理文章其他数据
        if($articlePageList['items']){
            $articleIdList = array_column($articlePageList['items'], 'id');

            // 2.1. 获取文章标签数据
            $articleTagGBArticleId = $this->getArticleTagMapListByArticleIdList($articleIdList);

            // 3. 装入其他数据
            foreach ($articlePageList['items'] as $index => &$item) {
                $item['articleTagList'] = $articleTagGBArticleId[$item['id']];
            }
        }

        // 分页显示
        $pager = new Page($articlePageList['page']['totalPage'], $articleParam['page']['pageSize']);
        $pageShow = $pager->show();
        $this->assign('page',$pageShow);

        $output['title'] = '文章列表';
        $output['data']['article'] = $articlePageList;
        $this->assign('output', $output);
        $this->display('article/list');
        return $this;
    }
    
    /**
     * @doc 文章分页列表数据[接口]
     * @author Heanes
     * @time 2016-11-06 18:34:51 周日
     */
    public function pageList() {
        ;
    }

    /**
     * @doc 编辑[页面]
     * @author Heanes
     * @time 2017-10-15 22:23:45 周天
     */
    public function editOp() {
        $requestId = I('request.id', null, 'int');
        if(!isset($requestId)){
            $this->error('参数不对');
        }
        $output = $this->commonOutput;
        $articleParam['where'] = $this->getCommonShowDataSelectParam();

        // 1. 查询数据
        $articleService = new ArticleService();
        $article = $articleService->getDetailById($requestId, $articleParam);

        // 1.1 查询所有文章分类数据
        
        // 1.1 查询所有文章标签数据

        // 2. 处理文章其他数据
        if($article){
            // 2.0 获取文章分类数据

            // 2.1. 获取文章标签数据
            $articleTagGBArticleId = $this->getArticleTagMapListByArticleIdList([$article['id']]);

            // 3. 装入其他数据
        }

        $output['title'] = '编辑文章';
        $output['data']['article'] = $article;
        $this->assign('output', $output);
        $this->display('article/edit');
        return $this;
    }
}