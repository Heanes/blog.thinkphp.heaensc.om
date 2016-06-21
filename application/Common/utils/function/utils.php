<?php
/**
 * @doc 工具类函数
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:10 周二
 */

/**
 * @doc 返回json
 * @param $anything array||string 要转的对象
 * @param $option string json编码常量
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:45 周二
 */
function returnJson($anything, $option = JSON_UNESCAPED_SLASHES ){
    echo json_encode($anything, $option);
}