<?php
/**
 * @doc 文章标签
 * @author Heanes
 * @time 2017-09-16 11:47:46 周六
 */

namespace Common\Service;

use Common\Model\ArticleTagModel;

class ArticleTagService extends BaseService {

    function __construct() {
        parent::__construct();
    }

    /**
     * @doc 获取标签下的文章列表
     * @param array $param
     * @param string $resultStyle
     * @return array
     * @author Heanes
     * @time 2017-09-19 11:03:39 周二
     */
    public function getArticleList($param = [], $resultStyle = RESULT_STYLE_CAMEL) {
        // 关联文章表，文章标签表查询标签下的文章列表
        $page = null;
        $articleTagModel = new ArticleTagModel();
        $join = '__ARTICLE__ as a ON a.id = at.article_id';
        if(isset($param['page'])){
            // 处理分页
            $totalItem = $articleTagModel->countList($param);
            $page = $articleTagModel->generatePageResult($totalItem, $param['page']['pageNumber'], $param['page']['pageSize']);

            $articleList = $articleTagModel
                ->table("__ARTICLE_TAG__ as at")
                ->field('a.*')
                ->join($join, 'left')
                ->where($param['where'])
                ->page($articleTagModel->generatePagePram($param['page']))
                ->order($param['order'])
                ->select();
        }else{
            $articleList = $articleTagModel
                ->table("__ARTICLE_TAG__ as at")
                ->field('a.*')
                ->join($join, 'left')
                ->where($param['where'])
                ->order($param['order'])
                ->select();
        }
        if($articleList == null || count($articleList) <= 0){
            if(isset($param['page'])){
                return ['items' => [], 'page' => $page];
            }
            return null;
        }
        // 后续数据处理
        foreach ($articleList as $index => &$item) {
            $item['publishTimeFormative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $item['publish_time']);
        }
        // 如果有分页，则装入分页
        if(isset($param['page']) && isset($page)){
            $articleList = ['items' => $articleList, 'page' => $page];
        }
        // 如果是驼峰格式
        $articleListResult = $resultStyle == RESULT_STYLE_CAMEL ? convertToCamelStyle($articleList) : $articleList;
        return $articleListResult;
    }

}