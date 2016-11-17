<?php
/**
 * @doc 文章分类模型
 * @author Heanes <heanes@163.com>
 * @time 2016-06-21 18:40:12 周二
 */

namespace Common\Model;
use Think\Model;
class ArticleCategoryModel extends Model {
    protected $tableName = 'article_category';
    
    /**
     * @doc 获取文章数据，分页或者不分页
     * @param array $param 参数
     * @return array|null
     * @author Heanes
     * @time 2016-11-13 13:33:34 周日
     */
    public function listAll($param, $resultStyle = RESULT_STYLE_CAMEL) {
        // 如果有分页
        if(isset($param['page'])){
            // 处理分页
            $totalItem = $this
                ->where($param['where'])
                ->count(1);
            $totalPage = (int) ceil($totalItem / $param['page']['pageSize']);
            $page = [
                'pageSize'      => $param['page']['pageSize'],
                'pageNumber'    => $param['page']['pageNumber'],
                'hasNextPage'   => $param['page']['pageNumber'] > 1,
                'hasPrevPage'   => ($totalPage - $param['page']['pageNumber']) > 1,
                'totalPage'     => $totalPage,
                'totalItem'     => $totalItem,
            ];
            $articleCategoryListRaw = $this
                ->page($param['page'])
                ->where($param['where'])
                ->select();
        }else{
            $articleCategoryListRaw = $this
                ->where($param['where'])
                ->select();
        }
        foreach ($articleCategoryListRaw as $index => &$articleCategory) {
            $articleCategory['publish_time_formative'] = date('Y-m-d H:i:s', $articleCategory['publish_time']);
        }
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleCategoryListResult = convertToCamelStyle($articleCategoryListRaw);
        }else{
            $articleCategoryListResult = $articleCategoryListRaw;
        }
        if(isset($param['page']) && isset($page)){
            return ['items' => $articleCategoryListResult, 'page' => $page];
        }
        return $articleCategoryListResult;
    }
    
    /**
     * @doc 返回文章分类详情
     * @param int $id 参数
     * @param string $resultStyle 结果样式，camel-驼峰样式，origin-原始样式
     * @return array
     * @author Heanes
     * @time 2016-11-13 13:34:57 周日
     */
    public function getDetailById($id, $param = null, $resultStyle = RESULT_STYLE_CAMEL) {
        if($param != null){
            if(is_array($param['where'])){
                $param['where'] = array_merge($param['where'], ['id' => $id]);
            }
            if(is_string($param['where'])){
                $param['where'] .= ' and `id` = ' . $id;
            }
        }
        $articleCategoryRaw = $this
            ->where($param['where'])
            ->find();
        if(count($articleCategoryRaw) <= 0){
            return null;
        }
        $articleCategoryRaw['publish_time_formative'] = date('Y-m-d H:i:s', $articleCategoryRaw['publish_time']);
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleCategoryResult = convertToCamelStyle($articleCategoryRaw);
            return $articleCategoryResult;
        }
        return $articleCategoryRaw;
    }
}