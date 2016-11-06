<?php
/**
 * @doc 前台首页控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:34:51 周二
 */
namespace Home\Controller;
class IndexController extends BaseHomeController {

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

        // 显示文章列表信息
        $articleController = new ArticleController;// 可用简写方法A('Article');但是太low
        $articleList = $articleController->pageList([]);
        $output['data']['article'] = $articleList;

        $output['common']['title'] = '首页';
        $this->assign('output', $output);
        $this->display('index');
    }

}