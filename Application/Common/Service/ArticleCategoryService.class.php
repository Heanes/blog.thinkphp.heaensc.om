<?php
/**
 * @doc 文章分类服务
 * @author Heanes
 * @time 2017-09-10 19:56:43 周日
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;

class ArticleCategoryService extends BaseService{

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;

    function __construct() {
        parent::__construct();
        $this->articleCategoryModel = new ArticleCategoryModel();
    }

    /**
     * @doc 列表页
     * @param array $param 查询参数
     * @param string $resultStyle 结果风格，驼峰或者原生
     * @return array
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     */
    /*public function getList($param, $resultStyle = RESULT_STYLE_CAMEL){
        var_dump('fdfd');
        // 0. 查询文章基本数据
        $articleListRaw = $this->articleCategoryModel->getList($param);

        // 如果是驼峰格式
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleListResult = convertToCamelStyle($articleListRaw);
        }else{
            $articleListResult = $articleListRaw;
        }

        return $articleListResult;
    }*/

    /**
     * @doc 列表页
     * @param array $param 查询参数
     * @param string $resultStyle 结果风格，驼峰或者原生
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     * @return array|null|string
     */
    public function getDetailById($id, $param, $resultStyle = RESULT_STYLE_CAMEL){
        $param['where']['id'] = $id;
        $articleRaw = $this->articleCategoryModel->getOne($param);
        if($articleRaw == null || count($articleRaw) == 0){
            return [];
        }
        // 数据后续加工处理
        $articleRaw['publish_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['publish_time']);

        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleResult = convertToCamelStyle($articleRaw);
            return $articleResult;
        }
        return $articleRaw;
    }

}