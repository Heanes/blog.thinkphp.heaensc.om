<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Index\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Service\ArticleCategoryService;
use Common\Service\ArticleService;
use Common\Service\ArticleTagService;
use Think\Page;

class ArticleController extends BaseIndexController {

    /**
     * @var ArticleService 文章服务
     */
    private $articleService;

    function __construct() {
        parent::__construct();

        $this->articleService = new ArticleService();
    }

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        return $this->listOp();
    }

    /**
     * @doc 显示文章列表
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:45:47 周二
     */
    public function listOp() {
        $output = $this->commonOutput;
        $param['where'] = $this->getCommonShowDataSelectParam();
        // 参数判断
        // 1.1.是否带有文章分类参数
        $requestArticleCategory = I('request.articleCategory', null, 'string');
        if(isset($requestArticleCategory)){
            $paramArticleCategory['where'][] = [
                'code' => $requestArticleCategory,
            ];
            $articleCategoryService = new ArticleCategoryService($paramArticleCategory);
            $articleCategoryRaw = $articleCategoryService->getOne();
            if($articleCategoryRaw && $articleCategoryRaw != null && count($articleCategoryRaw)){
                $param['where'][] = [
                    'category_id' => $articleCategoryRaw['id']
                ];
                $output['common']['title'] = $articleCategoryRaw['name'];
            }
        }

        // 1.2.分页参数
        $param['page'] = $this->getPageParamArray();

        $output['data']['article'] = $articlePageList = $this->articleService->getList($param);

        // 分页显示
        $pager = new Page($articlePageList['page']['totalPage'], $param['page']['pageSize']);
        $pageShow = $pager->show();
        $this->assign('page',$pageShow);
        
        $output['common']['title'] .= '文章列表';
        $this->assign('output', $output);
        $this->display('list');
        return $this;
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

        // 0. 获取文章数据
        $param['where'] = $this->getCommonShowDataSelectParam();
        $articleSR = $this->articleService->getDetailById($requestId, $param);
        $articleSR['publishTimeFormativeCh'] = date('Y年m月d日 - H时i分s秒', $articleSR['publishTime']);

        // 1. 文章分类信息
        $articleCategoryService = new ArticleCategoryService();
        $articleCategoryListSR = $articleCategoryService->getList();
        $articleSR['articleCategoryTree'] = findParent($articleCategoryListSR, $articleSR['categoryId']);
        // 2. 获取文章作者信息

        // 3. 获取文章标签信息
        $articleTagService = new ArticleTagService();
        $articleTagSR = $articleTagService->getList();
        $articleSR['articleTagList'] = $articleTagSR;

        $output['id'] = $requestId;
        $output['data'] = $articleSR;
        $output['common']['title'] = $articleSR['title'] . ' - 文章详情';
        $this->assign('output', $output);
        $this->display('detail');
        // 后续操作
        $this->afterDetailHandle($requestId);
        return $this;
    }

    /**
     * @doc 点击文章后的后续操作
     * @author Heanes
     * @time 2017-09-18 10:19:17 周一
     */
    private function afterDetailHandle($requestId) {
        // TODO 更新文章相关属性，如阅读数等
        // 1. 更新文章点击数据
        $param['id'] = $requestId;
        $this->articleService->afterDetailHandle($param);
        // 2. 记录文章访客

        // 3. 用户阅读历史记录
    }
}