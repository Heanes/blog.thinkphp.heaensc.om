<?php
/**
 * @doc 分页组件
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-23 12:04:09 周四
 */
namespace Common\Component;
class Page{

    /**
     * @var int 总条数
     */
    public $total;

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
     * @var array 额外参数
     */
    public $parameter;

    function __construct($pageSize, $pageNumber, $parameter = []) {
        $this->pageNumber = $pageNumber;
        $this->pageSize = $pageSize;
        $this->parameter = $parameter;
    }
}