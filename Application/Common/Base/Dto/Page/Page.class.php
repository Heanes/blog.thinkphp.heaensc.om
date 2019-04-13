<?php
/**
 * @doc 分页的页数据
 * @author Heanes
 * @time 2019-03-11 18:25:46 周一
 */

namespace Common\Base\Dto;

use JsonSerializable;

class Page implements JsonSerializable{

    use ClassBase;

    /**
     * @var integer
     */
    private $pageNumber;

    /**
     * @var integer
     */
    private $pageSize;

    /**
     * @var integer
     */
    private $total;

    /**
     * @var integer
     */
    private $totalPage;

    /**
     * @var boolean
     */
    private $hasPrevPage;

    /**
     * @var boolean
     */
    private $hasNextPage;

    /**
     * Page constructor.
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param int $total
     * @param int $totalPage
     * @param bool $hasPrevPage
     * @param bool $hasNextPage
     */
    public function __construct(int $pageNumber, int $pageSize, int $total, int $totalPage, bool $hasPrevPage, bool $hasNextPage) {
        $this->pageNumber  = $pageNumber;
        $this->pageSize    = $pageSize;
        $this->total       = $total;
        $this->totalPage   = $totalPage;
        $this->hasPrevPage = $hasPrevPage;
        $this->hasNextPage = $hasNextPage;
    }


    /**
     * @return int
     */
    public function getPageNumber(): int {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     */
    public function setPageNumber(int $pageNumber): void {
        $this->pageNumber = $pageNumber;
    }

    /**
     * @return int
     */
    public function getPageSize(): int {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void {
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getTotal(): int {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getTotalPage(): int {
        return $this->totalPage;
    }

    /**
     * @param int $totalPage
     */
    public function setTotalPage(int $totalPage): void {
        $this->totalPage = $totalPage;
    }

    /**
     * @return bool
     */
    public function isHasPrevPage(): bool {
        return $this->hasPrevPage;
    }

    /**
     * @param bool $hasPrevPage
     */
    public function setHasPrevPage(bool $hasPrevPage): void {
        $this->hasPrevPage = $hasPrevPage;
    }

    /**
     * @return bool
     */
    public function isHasNextPage(): bool {
        return $this->hasNextPage;
    }

    /**
     * @param bool $hasNextPage
     */
    public function setHasNextPage(bool $hasNextPage): void {
        $this->hasNextPage = $hasNextPage;
    }

}