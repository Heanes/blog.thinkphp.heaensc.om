<?php
/**
 * @doc 文章模型
 * @author Heanes <heanes@163.com>
 * @time 2016-06-21 18:40:12 周二
 */

namespace Common\Model;
use Think\Model;
class ArticleModel extends Model {
    protected $tableName = 'article';
    
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
            $pageLimit = [($param['page']['pageNumber'] - 1) * $param['page']['pageSize'], $param['page']['pageSize']];
            $totalItem = $this
                ->where($param['where'])
                ->count(1);
            $totalPage = (int) ceil($totalItem / $param['page']['pageSize']);
            $page = [
                'pageSize'      => $param['page']['pageSize'],
                'pageNumber'    => $param['page']['pageNumber'],
                'pageHasPrev'   => $param['page']['pageNumber'] > 1,
                'pageHasNext'   => ($totalPage - $param['page']['pageNumber']) > 1,
                'totalPage'     => $totalPage,
                'totalItem'     => $totalItem,
            ];
            $articleListRaw = $this
                ->page($param['page'])
                ->where($param['where'])
                ->select();
        }else{
            $articleListRaw = $this
                ->where($param['where'])
                ->select();
        }
        foreach ($articleListRaw as $index => &$article) {
            $article['publish_time_formative'] = date('Y-m-d H:i:s', $article['publish_time']);
        }
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleListResult = convertToCamelStyle($articleListRaw);
        }else{
            $articleListResult = $articleListRaw;
        }
        if(isset($param['page']) && isset($page)){
            return ['items' => $articleListResult, 'page' => $page];
        }
        return $articleListResult;
    }
    
    /**
     * @doc 返回文章详情
     * @param int $id 参数
     * @param string $resultStyle 结果样式，camel-驼峰样式，origin-原始样式
     * @return array
     * @author Heanes
     * @time 2016-11-13 13:34:57 周日
     */
    public function getDetailById($id, $resultStyle = RESULT_STYLE_CAMEL) {
        $articleRaw = $this
            ->where('id = '. $id .' and is_enable = 1 and is_deleted = 0')
            ->find();
        if(count($articleRaw) <= 0){
            return null;
        }
        $articleRaw['publish_time_formative'] = date('Y-m-d H:i:s', $articleRaw['publish_time']);
        if($resultStyle == RESULT_STYLE_CAMEL){
            $articleResult = convertToCamelStyle($articleRaw);
            return $articleResult;
        }
        return $articleRaw;
    }
}