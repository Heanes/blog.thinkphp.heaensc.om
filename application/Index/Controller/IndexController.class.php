<?php
/**
 * @doc 前台首页控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:34:51 周二
 */
namespace Index\Controller;
use Common\Service\ArticleService;
use Common\Service\ArticleTagLibService;
use Common\Service\ArticleTagService;
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
        $output['data']['article'] = $articlePageList;

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
        // 0.1. 分页参数
        $articleParam['page'] = $this->getPageParamArray();
        // 1. 查询数据
        $articleService = new ArticleService();
        $articlePageList = $articleService->getList($articleParam);
        // 2. 处理文章其他数据
        if($articlePageList['items']){
            $articleIdList = array_column($articlePageList['items'], 'id');

            // 2.1. 获取文章标签数据
            $articleTagParam['where']['article_id'] = ['in', $articleIdList];
            $articleTagService = new ArticleTagService();
            $articleTagSR = $articleTagService->getList($articleTagParam);
            $articleTagGBArticleId = [];
            if($articleTagSR){
                $articleTagIdList = array_column($articleTagSR, 'tagId');
                $articleTagLibParam['where']['id'] = ['in', $articleTagIdList];
                $articleTagLibService = new ArticleTagLibService();
                $articleTagLibSR = $articleTagLibService->getList($articleTagLibParam);
                if($articleTagLibSR){
                    $articleTagLibDataIBId = arrayToKeyIndex($articleTagLibSR, 'id');
                    foreach ($articleTagSR as $index => $item) {
                        $tag = $articleTagLibDataIBId[$item['tagId']];
                        $articleTagGBArticleId[$item['articleId']][] = ['id' => $tag['id'], 'name' => $tag['name'], 'url' => U('articleTag/' . urlencode($tag['name']))];
                    }
                }
            }

            // 3. 装入其他数据
            foreach ($articlePageList['items'] as $index => &$item) {
                $item['articleTagList'] = $articleTagGBArticleId[$item['id']];
            }
        }

        // 文章分页显示
        $articlePageList['articlePager'] = $articlePager = new Page($articlePageList['page']['totalPage'], $articleParam['page']['pageSize']);
        $articlePageList['articlePageShow'] = $articlePageShow = $articlePager->show();

        return $articlePageList;
    }

}