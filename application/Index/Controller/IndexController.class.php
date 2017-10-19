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
use Index\Controller\Article\ArticleWebService;
use Think\Page;

class IndexController extends BaseIndexController {

    use ArticleWebService;


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
        $articlePageList = $this->getArticleList();
        $output['data']['article'] = $articlePageList;

        $output['common']['title'] = '首页';
        $this->assign('output', $output);
        $this->display('index');
    }

}