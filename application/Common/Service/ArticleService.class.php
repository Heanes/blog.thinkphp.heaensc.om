<?php
/**
 * @doc 文章相关服务
 * @author Heanes
 * @time 2017-09-10 19:56:43 周日
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

use Common\Constants\ArticleConstants;
use Common\Model\ArticleContentModel;
use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;
use Think\Exception;

class ArticleService extends BaseService{

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @var ArticleContentModel 文章模型
     */
    private $articleContentModel;

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
     * @param array $param 查询参数
     * @param string $resultStyle 结果风格，驼峰或者原生
     * @return array
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     */
    public function getList($param = [], $resultStyle = RESULT_STYLE_CAMEL){
        // 1. 打印请求参数日志
        // 2. try catch 出错打印错误日志
        try{
            ;
        } catch (Exception $ex){
            ;
        }
        // 0. 查询文章基本数据
        $articleListRaw = $this->articleModel->getList($param);

        $articleListDataRaw = $articleListRaw;
        if(isset($param['page'])){
            $articleListDataRaw = $articleListRaw['items'];
        }

        // 遍历一次得到相关备查数据
        if(empty($articleListDataRaw)){
            return [];
        }

        $articleCategoryIdList[] = array_column($articleListDataRaw, 'category_id');
        $articleCategoryIdList = array_unique($articleCategoryIdList);

        // 1. 查询文章分类信息
        $articleCategoryParam = [];
        $articleCategoryParam['id'] = ['in', $articleCategoryIdList];

        $articleCategoryService = new ArticleCategoryService();
        $articleCategoryListSR = $articleCategoryService->getList();
        $articleCategoryListIBId = arrayToKeyIndex($articleCategoryListSR);
        // 2. 查询文章标签信息

        // 3. 查询文章作者信息

        // ---- 数据后续加工处理，输出dto
        foreach ($articleListDataRaw as $index => &$item) {
            $item['publish_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $item['publish_time']);
            $item['create_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $item['create_time']);
            // 文章分类
            $item['article_category'] = $articleCategoryListIBId[$item['category_id']];
            // 链接url
            $item = $this->getLinkCode($item);
        }
        $articleListRaw['items'] = $articleListDataRaw;

        // 如果是驼峰格式
        $articleListResult = $resultStyle == RESULT_STYLE_CAMEL ? convertToCamelStyle($articleListRaw) : $articleListRaw;
        return $articleListResult;
    }

    /**
     * @doc 获取友好链接
     * @param $item
     * @return mixed
     * @author Heanes
     * @time 2019-03-26 23:57:53 周二
     */
    private function getLinkCode($item) {
        if(!$item['semantic_link']){
            $item['semantic_link'] = $item['id'];
        }
        return $item;
    }

    /**
     * @doc 文章数据详情
     * @param array $param 查询参数
     * @param string $resultStyle 结果风格，驼峰或者原生
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     * @return array|null|string
     */
    public function getDetailByParam($param, $resultStyle = RESULT_STYLE_CAMEL){
        $whereOr = $param;
        $whereOr['_logic'] = 'or';
        $where['_complex'] = $whereOr;
        $where['is_enable'] = 1;
        $where['is_deleted'] = 0;
        $articleRaw = $this->articleModel->where($where)->limit(1)->find();
        if($articleRaw == null || count($articleRaw) == 0){
            return [];
        }
        // 0. 查询文章内容信息
        $articleContentModel = new ArticleContentModel();
        $articleContentParam['where']['article_id'] = $articleRaw['id'];
        $articleContentRaw = $articleContentModel->getOne($articleContentParam);
        $articleRaw['content'] = $articleContentRaw['content'] ?: '';

        // 1. 查询文章分类信息
        /*$articleCategoryService = new ArticleCategoryService();
        $articleCategoryListSR = $articleCategoryService->getList();
        $articleRaw['articleCategoryTree'] = findParent($articleCategoryListSR, $articleRaw['category_id']);*/
        // 数据后续加工处理
        $articleRaw['publish_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['publish_time']);
        $articleRaw['create_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['create_time']);

        $articleResult = $resultStyle == RESULT_STYLE_CAMEL ? convertToCamelStyle($articleRaw) : $articleRaw;
        return $articleResult;
    }

    /**
     * @doc 文章数据详情
     * @param array $param 查询参数
     * @param string $resultStyle 结果风格，驼峰或者原生
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:56:00 周二
     * @return array|null|string
     */
    public function getDetailById($id, $param, $resultStyle = RESULT_STYLE_CAMEL){
        $param['where']['id'] = $id;
        $articleRaw = $this->articleModel->getOne($param);
        if($articleRaw == null || count($articleRaw) == 0){
            return [];
        }
        // 0. 查询文章内容信息
        $articleContentModel = new ArticleContentModel();
        $articleContentParam['where']['article_id'] = $articleRaw['id'];
        $articleContentRaw = $articleContentModel->getOne($articleContentParam);
        $articleRaw['content'] = $articleContentRaw['content'] ?: '';

        // 1. 查询文章分类信息
        /*$articleCategoryService = new ArticleCategoryService();
        $articleCategoryListSR = $articleCategoryService->getList();
        $articleRaw['articleCategoryTree'] = findParent($articleCategoryListSR, $articleRaw['category_id']);*/
        // 数据后续加工处理
        $articleRaw['publish_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['publish_time']);
        $articleRaw['create_time_formative'] = date(DATE_TIME_FORMATIVE_DEFAULT, $articleRaw['create_time']);

        $articleResult = $resultStyle == RESULT_STYLE_CAMEL ? convertToCamelStyle($articleRaw) : $articleRaw;
        return $articleResult;
    }

    /**
     * @doc 阅读文章后的操作
     * @return int 更新结果
     * @author Heanes
     * @time 2017-09-18 11:29:43 周一
     */
    public function afterDetailHandle($param) {
        // 0.0 更新文章点击数据
        $updateCount = $this->articleModel->where($param)->setInc('click_count');
        // 0.1 更新文章阅读数，可以自定一套规则

        // 1. 记录文章访客

        // 2. 用户阅读历史记录
        return $updateCount;
    }

    /**
     * @doc 更新文章
     * @param array $param
     * @return bool|mixed
     * @author Heanes
     * @time 2017-09-18 11:29:43 周一
     */
    public function update($param) {
        $updateCount = 0;
        // 1. 先更新文章数据
        $articleParam = [
            'data' => [
                'title' => $param['data']['title'],
                'create_time' => strtotime($param['data']['publishTimeFormative']),
                'publish_time' => strtotime($param['data']['createTimeFormative']),
                'update_time' => strtotime($param['data']['updateTimeFormative']),
            ],
            'where' => [
                'id' => $param['where']['id'],
            ],
        ];
        $updateArticleCount = $this->articleModel->update($articleParam);
        // 2. 再更新文章内容数据
        $articleContentModel = new ArticleContentModel();
        $articleContentParam = [
            'data' => [
                'content' => $param['data']['content'],
            ],
            'where' => [
                'article_id' => $param['where']['id'],
            ],
        ];
        $updateArticleContentCount = $articleContentModel->update($articleContentParam);
        // 3. 再更新文章标签数据

        return $updateArticleContentCount;
    }

    /**
     * @doc 添加文章
     * @param array $param
     * @return bool|mixed
     * @author Heanes
     * @time 2018-01-13 21:26:02 周六
     */
    public function insert($param) {
        $insertCount = 0;
        // 1. 先更新文章数据
        $articleParam = [
            'data' => [
                'title' => $param['data']['title'],
                'create_time' => strtotime($param['data']['publishTimeFormative']),
                'publish_time' => strtotime($param['data']['createTimeFormative']),
                'update_time' => strtotime($param['data']['updateTimeFormative']),
                'content' => $param['data']['content'],
            ]
        ];
        $lastId = $this->articleModel->insert($articleParam);
        // 2. 再更新文章内容数据
        $articleContentModel = new ArticleContentModel();
        $articleContentParam = [
            'data' => [
                'content' => $param['data']['content'],
                'article_id' => $lastId,
                'create_time' => time(),
            ]
        ];
        $insertArticleContentLastId = $articleContentModel->insert($articleContentParam);
        return $insertArticleContentLastId;
    }

}