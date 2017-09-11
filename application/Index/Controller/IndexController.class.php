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

    private $output;

    /**
     * @var ArticleService 文章服务
     */
    private $articleService;

    function __construct(){
        parent::__construct();
        $this->output = $this->commonOutput;

        //var_dump(C());
        //var_dump(get_included_files());

        $this->articleService = new ArticleService();
    }

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        // 显示公共信息相关
        $output = $this->commonOutput;

        // 显示文章列表信息
        $articleParam = [];
        $articleParam['where'] = $this->getCommonShowDataSelectParam();
        // 1.2.分页参数
        $articleParam['page'] = $this->getPageParamArray();

        // 查询数据
        $output['data']['article'] = $articlePageList = $this->articleService->getList($articleParam);

        // 分页显示
        $pager = new Page($articlePageList['page']['totalPage'], $articleParam['page']['pageSize']);
        $pageShow = $pager->show();
        $this->assign('page',$pageShow);

        $output['common']['title'] = '首页';
        $this->assign('output', $output);
        $this->display('index');
    }

}