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
 * @param string|array $mix 要被转化的字符或数组，将会递归更改
 * @param string $type key|value|all 转换位置，key代表数组的键，value代表数组的值，all代表都转换
 * @return null|string|array
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-27 11:25:29 周一
 */
function convertToCamelStyle($mix, $type = 'key'){
    if(!isset($mix)){
        return '';
    }
    if(!is_array($mix)){
        $words = explode('_', trim($mix));
        $str = '';
        foreach ($words as $word) {
            $str .= ucfirst($word);
        }
        return lcfirst($str);
    }
    if(is_array($mix)){
        $newArray = [];
        foreach ($mix as $index => &$item) {
            if(is_array($item)){
                $item = convertToCamelStyle($item, $type);
            }
            if($type == 'key' || $type == 'all'){
                $indexStr = '';
                $indexArr = explode('_', trim($index));
                foreach ($indexArr as $indexTemp) {
                    $indexStr .= ucfirst($indexTemp);
                }
                $index = lcfirst($indexStr);
            }
            if(!is_array($item)){
                if($type == 'value' || $type == 'all'){
                    $itemStr = '';
                    $itemArr = explode('_', trim($item));
                    foreach ($itemArr as $itemTemp) {
                        $itemStr .= ucfirst($itemTemp);
                    }
                    $item = lcfirst($itemStr);
                }
            }
            $newArray[$index] = $item;
        }
        return $newArray;
    }
    return '';
}

/**
 * @doc 将驼峰风格转为下划线分隔，正则方式
 * @param string $string 欲被转化的字符串
 * @return string
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-01 11:30:46 周五
 */
function convertCamelToUnderlineStyleByPreg($string){
    return strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', $string));
}

/**
 * @doc 将驼峰风格转为下划线分隔，遍历字符对比是否为大写字符模式
 * @param string $string 欲被转化的字符串
 * @return string
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-01 12:15:08 周五
 */
function convertCamelToUnderlineStyle($string){
    $newString = '';
    for($i = 0, $length = strlen($string); $i < $length; $i++){
        $alphabetLower = strtolower($string[$i]);
        if($string[$i] != $alphabetLower){
            $newString .= '_' . $alphabetLower;
        }else{
            $newString .= $string[$i];
        }
    }
    return $newString;
}