<?php
/**
 * @doc 文章相关服务
 * @author Heanes
 * @time 2017-09-10 19:56:43 周日
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleService extends BaseService{

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
     * @doc 列表页
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     */
    public function getList($param, $resultStyle = RESULT_STYLE_CAMEL){
        $articleListRaw = $this->articleModel->listAll($param, $resultStyle);

        // 如果是驼峰格式
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleListResult = convertToCamelStyle($articleListRaw);
        }else{
            $articleListResult = $articleListRaw;
        }

        return $articleListResult;

    }

    /**
     * @doc 列表页
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     */
    public function getDetailById($id, $param, $resultStyle = RESULT_STYLE_CAMEL){
        $articleRaw = $this->articleModel->getDetailById($id, $param);
        if($articleRaw == null || count($articleRaw) == 0){
            return [];
        }
        // 数据处理
        $articleRaw[0]['publish_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['publish_time']);
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleResult = convertToCamelStyle($articleRaw);
            return $articleResult;
        }
        return $articleRaw[0];
    }

}