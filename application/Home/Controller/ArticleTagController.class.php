<?php
/**
 * @doc 文章标签控制器
 * @author Heanes
 * @time 2016-08-06 21:53:04
 */
namespace Home\Controller;

use Common\Model\ArticleTagModel;
use Common\Model\ArticleModel;

require_once(APP_PATH.'Common/utils/func/utils.php');
class ArticleTagController extends BaseHomeController{
    
    /**
     * @var ArticleTagModel 文章标签模型
     */
    private $articleTagModel;
    
    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;
    
    
    function __construct() {
        parent::__construct();
        $this->articleTagModel = new ArticleTagModel();
        $this->articleModel = new ArticleModel();
    }
    
    public function indexOp() {
        $this->listOp();
    }
    
    /**
     * @doc 文章标签库列表页面
     * @author Heanes
     * @time 2016-08-07 11:09:41
     */
    public function listOp() {
        ;
    }
    
    /**
     * @doc 文章标签库列表方法
     * @param $param
     * @return array
     * @author Heanes
     * @time 2016-08-07 16:11:02
     */
    public function list_($param) {
        // 处理分页
        $pageLimit = [($param['page']['pageNumber'] - 1) * $param['page']['pageSize'], $param['page']['pageSize']];
        $totalCount = $this->articleTagModel
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
    
        $articleTagListRaw = $this->articleTagModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->limit(implode(',', $pageLimit))
            ->select();
        $articleListTagCamelStyle = convertToCamelStyle($articleTagListRaw);
    
        return ['rows' => $articleListTagCamelStyle, 'page' => $page];
    }
}