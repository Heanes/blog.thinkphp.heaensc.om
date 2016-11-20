<?php
/**
 * @doc 分页组件
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-23 12:04:09 周四
 */
namespace Common\Component;
!defined('REQUEST_PAGE_PARAM_NAME_DEFAULT') ?: define('REQUEST_PAGE_PARAM_NAME_DEFAULT', 'p');
!defined('REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT') ?: define('REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT', 'pageSize');
!defined('DATA_LIST_PAGE_SIZE_DEFAULT') ?: define('DATA_LIST_PAGE_SIZE_DEFAULT', 20);
class Page{

    /**
     * @var int 总条数
     */
    public $totalItem;
    /**
     * @var int 总条数
     */
    public $totalPage;
    /**
     * @var int 页码
     */
    public $pageNumber;
    /**
     * @var int 分页大小
     */
    public $pageSize;
    /**
     * @var int 当前页
     */
    public $currentPage;
    /**
     * @var bool 是否有下一页
     */
    public $hasNextPage;
    /**
     * @var bool 是否有上一页
     */
    public $hasPrevPage;
    /**
     * @var bool 是否显示总页数
     */
    public $showTotalPage;
    /**
     * @var string 分页参数名
     */
    public $pageParamName = 'p';
    /**
     * @var string 分页大小参数名
     */
    public $pageSizeParamName = 'pageSize';
    /**
     * @var array 额外参数
     */
    public $parameter;

    function __construct($pageSize, $pageNumber, $parameter = []) {
        $this->pageNumber = $pageNumber;
        $this->pageSize = $pageSize;
        $this->parameter = $parameter;
    }
    
    private function getPageSetting() {
        $pagePramName = $this->parameter['request_page_param_name'] ?: REQUEST_PAGE_PARAM_NAME_DEFAULT;
        $pageSizePramName = $this->parameter['request_page_size_param_name'] ?: REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT;
        $pageSizeDefault = $this->parameter['data_list_page_size'] ?: DATA_LIST_PAGE_SIZE_DEFAULT;
    
    }
    
    public function getPageResult() {
        $page = [
            'pageSize'      => $this->pageSize,
            'pageNumber'    => $this->pageNumber,
            'hasNextPage'   => $this->pageNumber > 1,
            'hasPrevPage'   => ($this->totalItem - $this->pageNumber) > 1,
            'totalPage'     => $this->totalPage,
            'totalItem'     => $this->totalItem,
        ];
        return $page;
    }
}