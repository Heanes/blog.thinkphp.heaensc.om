<?php
/**
 * @doc 工具类函数
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:10 周二
 */
defined('inHeanes') or die('Access denied!');

/**
 * @doc 返回json
 * @param array|string $anything 要转的对象
 * @param int|string $option string json编码常量
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:45 周二
 */
function returnJson($anything, $option = JSON_UNESCAPED_SLASHES ){
    echo json_encode($anything, $option);
}

/**
 * @doc 将数组或字符串转为驼峰风格
 * @param $array string|array
 * @return null|string|array
 * @author Heanes fang <heaens@163.com>
 * @time 2016-06-27 11:25:29 周一
 */
function convertToHumpStyle($array){
    if(!isset($array)){
        return null;
    }
    if(!is_array($array)){
        $words = explode('_', $array);
        $str = '';
        foreach ($words as $word) {
            $str .= ucfirst($word);
        }
        return lcfirst($str);
    }
    if(is_array($array)){
        $newArray = [];
        foreach ($array as $index => &$item) {
            if(is_array($item)){
                $item = convertToHumpStyle($item);
            }
            $indexStr = '';
            $indexArr = explode('_', $index);
            foreach ($indexArr as $indexTemp) {
                $indexStr .= ucfirst($indexTemp);
            }
            $index = lcfirst($indexStr);
            $newArray[$index] = $item;
        }
        return $newArray;
    }
    return null;
}