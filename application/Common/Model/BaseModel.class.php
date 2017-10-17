<?php
/**
 * @doc 公用模型类
 * @author Heanes <heanes@163.com>
 * @time: 2016.11.15 015 10:25
 */
namespace Common\Model;
use Think\Model;
class BaseModel extends Model {

    function __construct($name='',$tablePrefix='',$connection='') {
        parent::__construct($name, $tablePrefix, $connection);
    }

    /**
     * @doc 公用获取列表方法
     * @param array|string $param 参数
     * @return array|mixed|null
     * @author Heanes
     * @time 2017-09-13 10:37:57 周三
     */
    public function getList($param){
        $page = null;
        // 如果有分页
        if(isset($param['page'])){
            // 处理分页
            $totalItem = $this->countList($param);
            $page = $this->generatePageResult($totalItem, $param['page']['pageNumber'], $param['page']['pageSize']);

            $dataListRaw = $this
                ->page($this->generatePagePram($param['page']))
                ->where($param['where'])
                ->order($param['order'])
                ->select();
        }else{
            $dataListRaw = $this
                ->where($param['where'])
                ->order($param['order'])
                ->select();
        }
        if($dataListRaw == null || count($dataListRaw) <= 0){
            if(isset($param['page'])){
                return ['items' => [], 'page' => $page];
            }
            return null;
        }

        // 如果有分页，则装入分页
        if(isset($param['page']) && isset($page)){
            $dataListRaw = ['items' => $dataListRaw, 'page' => $page];
        }
        return $dataListRaw;
    }

    /**
     * @doc 公用根据参数统计总数方法
     * @param array $param
     * @return int
     * @author Heanes
     * @time 2017-09-13 11:58:55 周三
     */
    public function countList($param){
        // 统计总数
        $totalItem = $this
            ->where($param['where'])
            ->count(1);
        return $totalItem ?: 0;
    }

    /**
     * @doc 查询一行
     * @param array $param 其他参数
     * @return array 1个数据对象
     * @author Heanes
     * @time 2017-09-13 12:02:10 周三
     */
    public function getOne($param) {
        $dataRaw = $this
            ->where($param['where'])
            ->find();
        if($dataRaw == null || count($dataRaw) <= 0){
            return null;
        }

        return $dataRaw;
    }

    /**
     * @doc 根据id获取详情
     * @param int $id id
     * @param array $param 其他参数
     * @return mixed|null
     * @author Heanes
     * @time 2017-09-13 15:00:52 周三
     */
    public function getById($id, $param = []) {
        if($param != null){
            if(is_array($param['where'])){
                $param['where'] = array_merge($param['where'], ['id' => $id]);
            }
            if(is_string($param['where'])){
                $param['where'] .= ' and `id` = ' . $id;
            }
        }else{
            $param['where'] = '`id` = ' . $id;
        }
        $dataRaw = $this
            ->where($param['where'])
            ->find();
        if($dataRaw == null || count($dataRaw) <= 0){
            return null;
        }

        return $dataRaw;
    }

    public function insert($param = []){
        return 1;
    }

    public function update($param){
        $data = $param['data'];
        $paramWhere = $param['where'];
        $updateCount = $this->where($paramWhere)->save($data);
        return $updateCount;
    }

    /**
     * @doc 逻辑删除
     * @param $param
     * @return int
     * @author Heanes
     * @time 2017-09-18 11:08:26 周一
     */
    public function logicDelete($param){
        return 1;
    }

    /**
     * @doc 真实删除
     * @param $param
     * @return int
     * @author Heanes
     * @time 2017-09-18 11:08:39 周一
     */
    public function realDelete($param){
        return 1;
    }

    /**
     * @doc  生产分页结果对象
     * @param int $totalItem 总数
     * @param int $pageNumber 页码数
     * @param int $pageSize 分页大小
     * @return array
     * @author Heanes
     * @time 2017-09-13 11:49:22 周三
     */
    public function generatePageResult($totalItem, $pageNumber, $pageSize){
        $totalPage = (int) ceil($totalItem / $pageSize);
        return
            $page = [
                'pageSize'      => $pageSize,
                'pageNumber'    => $pageNumber,
                'hasPrevPage'   => $pageNumber > 1,
                'hasNextPage'   => ($totalPage - $pageNumber) > 1,
                'totalPage'     => $totalPage,
                'totalItem'     => $totalItem,
            ];
    }

    /**
     * @doc 生成分页参数
     * @param array $pageParam
     * @return string
     * @author Heanes
     * @time 2017-09-13 11:54:55 周三
     */
    public function generatePagePram($pageParam){
        $pageNumber = $pageParam['pageNumber'] ?: 1;
        $pageSize = $pageParam['pageSize'] ?: DATA_LIST_PAGE_SIZE_DEFAULT;
        return $pageNumber . ',' . $pageSize;
    }
}