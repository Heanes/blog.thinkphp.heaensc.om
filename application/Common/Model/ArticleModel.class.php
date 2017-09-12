<?php
/**
 * @doc 文章模型
 * @author Heanes <heanes@163.com>
 * @time 2016-06-21 18:40:12 周二
 */

namespace Common\Model;
use Think\Model;
class ArticleModel extends BaseModel  {
    protected $tableName = 'article';
    
    /**
     * @doc 获取文章数据，分页或者不分页
     * @param array $param 参数
     * @param string $resultStyle 数据结果风格，RESULT_STYLE_CAMEL-驼峰，RAW-原始类型不处理
     * @return array|null
     * @author Heanes
     * @time 2016-11-13 13:33:34 周日
     */
    public function listAll($param) {
        $page = null;
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
            $articleListRaw = $this
                ->page($this->getPagePram($param['page']))
                ->where($param['where'])
                ->select();
        }else{
            $articleListRaw = $this
                ->where($param['where'])
                ->select();
        }
        if($articleListRaw == null || count($articleListRaw) <= 0){
            if(isset($param['page'])){
                return ['items' => [], 'page' => $page];
            }
            return null;
        }
        foreach ($articleListRaw as $index => &$article) {
            $article['publish_time_formative'] = date('Y-m-d H:i:s', $article['publish_time']);
        }

        // 如果有分页，则转换数据格式
        if(isset($param['page']) && isset($page)){
            $articleListRaw = ['items' => $articleListRaw, 'page' => $page];
        }
        return $articleListRaw;
    }

    /**
     * @doc 返回文章详情
     * @param int $id 参数
     * @param string $resultStyle 结果样式，camel-驼峰样式，origin-原始样式
     * @return array
     * @author Heanes
     * @time 2016-11-13 13:34:57 周日
     */
    public function getDetailById($id, $param = null) {
        if($param != null){
            if(is_array($param['where'])){
                $param['where'] = array_merge($param['where'], ['id' => $id]);
            }
            if(is_string($param['where'])){
                $param['where'] .= ' and `id` = ' . $id;
            }
        }
        $articleRaw = $this
            ->where($param['where'])
            ->find();
        if($articleRaw == null || count($articleRaw) <= 0){
            return null;
        }

        return $articleRaw;
    }
}