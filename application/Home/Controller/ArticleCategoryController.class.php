<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Home\Controller;
use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;
class ArticleCategoryController extends BaseHomeController {

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

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
        $pagePramName = $this->commonOutput['settingCommon']['request_page_param_name'] ?: REQUEST_PAGE_PARAM_NAME_DEFAULT;
        $pageSizePramName = $this->commonOutput['settingCommon']['request_page_size_param_name'] ?: REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT;
        $pageSizeDefault = $this->commonOutput['settingCommon']['data_list_page_size'] ?: DATA_LIST_PAGE_SIZE_DEFAULT;
        $pageNumber = I('request' . $pagePramName, 1, 'int');
        $pageSize = I('request' . $pageSizePramName, $pageSizeDefault, 'int');
        $page = [
            'pageNumber'    => $pageNumber,
            'pageSize'      => $pageSize,
        ];
        $param['page'] = $page;

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
}