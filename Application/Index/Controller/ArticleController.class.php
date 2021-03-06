<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Index\Controller;
defined('InHeanes') or die('Access denied!');

use Index\Controller\Article\ArticleWebService;
use Common\Service\ArticleCategoryService;
use Common\Service\ArticleContentService;
use Common\Service\ArticleService;
use Think\Exception;
use Think\Page;

class ArticleController extends BaseIndexController {
    use ArticleWebService;

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
        $articleParam['where'] = $this->getCommonShowDataSelectParam();
        // 参数判断
        // 0.1.是否带有文章分类参数
        $requestArticleCategory = I('request.articleCategory', null, 'string');
        if(isset($requestArticleCategory)){
            $paramArticleCategory['where'][] = [
                'code' => $requestArticleCategory,
            ];
            $articleCategoryService = new ArticleCategoryService();
            $articleCategoryRaw = $articleCategoryService->getOne($paramArticleCategory);
            if($articleCategoryRaw && $articleCategoryRaw != null && count($articleCategoryRaw)){
                $articleParam['where'][] = [
                    'category_id' => $articleCategoryRaw['id']
                ];
                $output['common']['title'] = $articleCategoryRaw['name'];
            }
        }

        // 0.2.分页参数
        $articleParam['page'] = $this->getPageParamArray();
        $articleParam['order'] = 'publish_time desc, id desc';
        // 1. 查询数据
        $articlePageList = $this->getArticleList($articleParam);

        $output['common']['title'] .= '文章列表';
        $output['data']['article'] = $articlePageList;
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
        if($articleSR){
            $articleSR['publishTimeFormativeCh'] = date('Y年m月d日 - H时i分s秒', $articleSR['publishTime']);
            $articleContentService = new ArticleContentService();
            $articleContentParam['where']['article_id'] = $articleSR['id'];
            $articleContentSR = $articleContentService->getOne($articleContentParam);
            $articleSR['content'] = $articleContentSR['content'];
            // 1. 文章分类信息
            $articleCategoryService = new ArticleCategoryService();
            $articleCategoryListSR = $articleCategoryService->getList();
            $articleCategoryTree = findParent($articleCategoryListSR, $articleSR['categoryId']);
            foreach ($articleCategoryTree as $index => &$item) {
                $item['url'] = U('articleCategory/' . $item['code']);
            }
            $articleSR['articleCategoryTree'] = $articleCategoryTree;
            // 2. 获取文章作者信息
            $articleSR['author'] = [
                'id' => 1,
                'name' => 'Heanes',
                'url' => U('articleAuthor/' . 1),
            ];

            // 3. 获取文章标签信息
            $articleTagList = $this->getArticleTagMapListByArticleIdList([$requestId])[$requestId];

            $articleSR['articleTagList'] = $articleTagList;
            $articleSR['url'] = U('article/' . $requestId);
        }else{
            throw new Exception('没有这篇文章！');
        }

        $output['id'] = $requestId;
        $output['data'] = $articleSR;
        $output['common']['title'] = $articleSR['title'] . ' - 文章详情';
        $this->assign('output', $output);
        layout('layout/layoutArticle');
        $this->display('detail');
        // 后续操作
        $this->afterDetailHandle($requestId);
        return $this;
    }

    /**
     * @doc 点击文章后的后续操作
     * @param int $requestId 文章ID
     * @author Heanes
     * @time 2017-09-18 10:19:17 周一
     * @return $this
     */
    private function afterDetailHandle($requestId) {
        // 1. 更新文章点击数据
        $param['id'] = $requestId;
        $this->articleService->afterDetailHandle($param);
        // 2. 记录文章访客

        // 3. 用户阅读历史记录
        return $this;
    }

}