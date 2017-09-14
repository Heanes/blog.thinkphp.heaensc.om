<?php
/**
 * @doc 前台首页控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:34:51 周二
 */
namespace Index\Controller;
use Common\Service\ArticleService;
use Think\Page;

class IndexController extends BaseIndexController {

    /**
     * @var array
     */
    private $output;

    function __construct(){
        parent::__construct();
        $this->output = $this->commonOutput;

    }

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        // 显示公共信息相关
        $output = $this->commonOutput;

        // 1. 文章数据
        $articlePageList = $this->getArticleData();
        $output['data']['article'] = $articlePageList['articleList'];
        $this->assign('articlePage', $articlePageList['articlePageShow']);

        $output['common']['title'] = '首页';
        $this->assign('output', $output);
        $this->display('index');
    }

    /**
     * @doc 获取文章数据
     * @return mixed
     * @author Heanes
     * @time 2017-09-13 15:14:10 周三
     */
    private function getArticleData() {
        // 显示文章列表信息
        $articleParam = [];
        $articleParam['where'] = $this->getCommonShowDataSelectParam();
        // 1.2.分页参数
        $articleParam['page'] = $this->getPageParamArray();
        // 查询数据
        $articleService = new ArticleService();
        $articlePageList['articleList'] = $articleService->getList($articleParam);

        // 分页显示
        $articlePageList['articlePager'] = $articlePager = new Page($articlePageList['page']['totalPage'], $articleParam['page']['pageSize']);
        $articlePageList['articlePageShow'] = $articlePageShow = $articlePager->show();

        return $articlePageList;
    }

}