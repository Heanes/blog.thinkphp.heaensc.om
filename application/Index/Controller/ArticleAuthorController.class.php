<?php
/**
 * @doc 文章作者
 * @author Heanes
 * @time 2017-12-24 20:36:24 周日
 */

namespace Index\Controller;

use Index\Controller\Article\ArticleWebService;

class ArticleAuthorController extends BaseIndexController {

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