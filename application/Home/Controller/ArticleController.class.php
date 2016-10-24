<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Home\Controller;
defined('inHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleController extends BaseHomeController {

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;
    
    function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
        $this->articleCategoryModel = new ArticleCategoryModel();
    }

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        $this->listOp();
    }

    /**
     * @doc 显示文章列表
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:45:47 周二
     */
    public function listOp() {
        $param = [];
        // 参数判断
        // 1.1.是否带有文章分类参数
        if(I('request.articleCategory', '', 'string'))

        // 1.2.分页参数
        $page = [
            'pageNumber'    => $_GET['p'] ? $_GET['p'] : 1,
            'pageSize'      => $_GET['pageSize'] ? $_GET['pageSize'] : ARTICLE_LIST_PAGE_SIZE,
        ];
        $param['page'] = $page;
        $output = $this->commonOutput;
        $output['data']['article'] = $this->page_($param);
        $output['common']['title'] = ' - 文章列表';
        $this->assign('output', $output);
        $this->display('list');
    }

    /**
     * @doc 文章列表数据获取
     * @param array $param 参数
     * @author Heanes
     * @time 2016-07-16 22:11:34
     * @return array|null|string
     */
    public function list_($param) {
        // 处理分页
        $pageLimit = [($param['page']['pageNumber'] - 1) * $param['page']['pageSize'], $param['page']['pageSize']];
        $totalCount = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->count(1);
        $totalPage = ceil($totalCount / $param['page']['pageSize']);
        $page = [
            'pageSize' => $param['page']['pageSize'],
            'pageNumber' => $param['page']['pageNumber'],
            'pageHasNext' => ($totalPage - $param['page']['pageNumber']) > 1,
            'totalPage' => $totalPage,
            'total' => $totalCount,
        ];
        
        $articleListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit(implode(',', $pageLimit))
            ->select();
        foreach ($articleListRaw as $index => &$article) {
            $article['publish_time_formative'] = date('Y-m-d H:i:s', $article['publish_time']);
        }
        $articleListCamelStyle = convertToCamelStyle($articleListRaw);
        
        return ['rows' => $articleListCamelStyle, 'page' => $page];
    }

    /**
     * @doc 文章列表数据获取
     * @param array $param 参数
     * @author Heanes
     * @time 2016-07-16 22:11:34
     * @return array|null|string
     */
    public function page_($param) {
        // 处理分页
        $pageLimit = [($param['page']['pageNumber'] - 1) * $param['page']['pageSize'], $param['page']['pageSize']];
        $where = '';
        if($param['where']){
            foreach ($param['where'] as $index => $item) {
                $where .= $item['field'] . ' ' . $item['operator'] . ' ' . $item['value'];
            }
        }
        $where = $where . ($where ? ' and ' : '');

        $totalCount = $this->articleModel
            ->where($where. 'is_enable = 1 and is_deleted = 0')
            ->count(1);
        var_dump($this->articleModel->getLastSql());
        $totalPage = ceil($totalCount / $param['page']['pageSize']);
        $page = [
            'pageSize' => $param['page']['pageSize'],
            'pageNumber' => $param['page']['pageNumber'],
            'pageHasNext' => ($totalPage - $param['page']['pageNumber']) > 1,
            'totalPage' => $totalPage,
            'total' => $totalCount,
        ];

        $articleListRaw = $this->articleModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit(implode(',', $pageLimit))
            ->select();
        foreach ($articleListRaw as $index => &$article) {
            $article['publish_time_formative'] = date('Y-m-d H:i:s', $article['publish_time']);
        }
        $articleListCamelStyle = convertToCamelStyle($articleListRaw);

        return ['rows' => $articleListCamelStyle, 'page' => $page];
    }

    /**
     * @doc 显示文章内容
     * @author Heanes
     * @time 2016-06-21 14:46:05 周二
     */
    public function detailOp() {
        $param['id'] = $_REQUEST['id'];
        $output = $this->commonOutput;
        $output['id'] = $_REQUEST['id'];
        $output['data'] = $this->detail_($param);
        $output['common']['title'] = $output['data']['title'] . ' - 文章详情';
        $this->assign('output', $output);
        $this->display('detail');
    }

    /**
     * @doc 获取文章数据
     * @param array $param 参数
     * @author Heanes
     * @time 2016-07-16 22:01:15
     * @return array|null|string
     */
    public function detail_($param) {
        $articleRaw = $this->articleModel
            ->where('id = '. $param['id'] .' and is_enable = 1 and is_deleted = 0')
            ->find();
        $articleRaw['publish_time_formative'] = date('Y-m-d H:i:s', $articleRaw['publish_time']);
        $articleCamelStyle = convertToCamelStyle($articleRaw);
        return $articleCamelStyle;
    }
}