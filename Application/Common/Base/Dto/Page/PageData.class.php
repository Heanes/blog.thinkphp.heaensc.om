<?php
/**
 * @doc 分页结果
 * @author Heanes
 * @time 2019-03-11 18:26:09 周一
 */

namespace Common\Base\Dto;

use JsonSerializable;

class PageData implements JsonSerializable{

    use ClassBase;

    /**
     * @var array
     */
    private $items;

    /**
     * @var Page
     */
    private $page;

    /**
     * PageData constructor.
     *
     * @param array $items
     * @param Page $page
     */
    public function __construct(array $items, Page $page) {
        $this->items = $items;
        $this->page  = $page;
    }


    /**
     * @return array
     */
    public function getItems(): array {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return PageData
     */
    public function setItems(array $items): PageData {
        $this->items = $items;

        return $this;
    }

    /**
     * @return Page
     */
    public function getPage(): Page {
        return $this->page;
    }

    /**
     * @param Page $page
     *
     * @return PageData
     */
    public function setPage(Page $page): PageData {
        $this->page = $page;

        return $this;
    }


}