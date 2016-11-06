<?php
/**
 * @doc 文章管理模块
 * @author Heanes <heanes@163.com>
 * @time: 2016-11-06 18:27:48 周日
 */
namespace Admin\Controller;
use \Common\Model\ArticleCategoryModel;
use \Common\Model\ArticleModel;
defined('InHeanes') or exit('Access Invalid!');
class ArticleController extends BaseAdminController {
    
    /**
     * @var ArticleModel
     */
    private $articleModel;
    
    /**
     * @var ArticleCategoryModel
     */
    private $articleCategoryModel;
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * @doc 文章模块起始页面
     * @author Heanes
     * @time 2016-11-06 18:31:40 周日
     */
    public function indexOp() {
        ;
    }
    
    /**
     * @doc 文章分页列表
     * @author Heanes
     * @time 2016-11-06 18:34:51 周日
     */
    public function pageList() {
        ;
    }
    
    /**
     * @doc 文章列表获取
     * @author Heanes
     * @time 2016-11-06 18:34:24 周日
     */
    public function listAll() {
        ;
    }
}