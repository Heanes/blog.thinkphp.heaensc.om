<?php
/**
 * @doc 公用模型类
 * @author Heanes <heanes@163.com>
 * @time: 2016.11.15 015 10:25
 */
namespace Common\Model;
use Think\Model;
class BaseModel extends Model {
    
    public function getPagePram($pageParam){
        $pageNumber = $pageParam['pageNumber'] ?: 1;
        $pageSize = $pageParam['pageSize'] ?: DATA_LIST_PAGE_SIZE_DEFAULT;
        return $pageNumber . ',' . $pageSize;
    }
}