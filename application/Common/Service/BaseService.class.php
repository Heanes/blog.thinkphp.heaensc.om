<?php
/**
 * @doc 基础服务
 * @author Heanes
 * @time 2017-09-10 19:56:43 周日
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

class BaseService{

    function __construct() {
        ;
    }


    /**
     * @doc 获取公共的查询条件
     * @return array
     * @author Heanes
     * @time 2016-11-13 16:09:36 周日
     */
    public function getCommonShowDataSelectParam() {
        return [
            'is_enable'     => 1,
            'is_deleted'    => 0,
        ];
    }

}