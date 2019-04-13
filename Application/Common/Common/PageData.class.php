<?php
/**
 * @doc 分页数据容器定义
 * @author Heanes
 * @time 2017-09-13 15:41:39 周三
 */

namespace Common\Common;


class PageData {
    /**
     * @var array 数据列表
     */
    private $rows;
    /**
     * @var int 页码数
     */
    private $pageNumber = 1;
    /**
     * @var int 分页大小
     */
    private $pageSize;
    /**
     * @var int 总数
     */
    private $totalCount;
    /**
     * @var int 分页总数
     */
    private $totalPage;
    /**
     * @var boolean 是否有前一页
     */
    private $hasPrevPage;
    /**
     * @var boolean 是否有后一页
     */
    private $hasNextPage;

    /**
     * @return array
     */
    public function getRows() {
        return $this->rows;
    }

    /**
     * @param array $rows
     */
    public function setRows($rows) {
        $this->rows = $rows;
    }

    /**
     * @return int
     */
    public function getPageNumber() {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     */
    public function setPageNumber($pageNumber) {
        $this->pageNumber = $pageNumber;
    }

    /**
     * @return int
     */
    public function getPageSize() {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize($pageSize) {
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getTotalCount() {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount) {
        $this->totalCount = $totalCount;
    }

    /**
     * @return int
     */
    public function getTotalPage() {
        return $this->totalPage;
    }

    /**
     * @param int $totalPage
     */
    public function setTotalPage($totalPage) {
        $this->totalPage = $totalPage;
    }

    /**
     * @return bool
     */
    public function getHasPrevPage() {
        return $this->hasPrevPage;
    }

    /**
     * @param bool $hasPrevPage
     */
    public function setHasPrevPage($hasPrevPage) {
        $this->hasPrevPage = $hasPrevPage;
    }

    /**
     * @return bool
     */
    public function getHasNextPage() {
        return $this->hasNextPage;
    }

    /**
     * @param bool $hasNextPage
     */
    public function setHasNextPage($hasNextPage) {
        $this->hasNextPage = $hasNextPage;
    }


}