<?php
/**
 * @doc 工具类函数
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:10 周二
 */
defined('InHeanes') or die('Access denied!');

/**
 * @doc 返回json
 * @param array|string $anything 要转的对象
 * @param int|string $option string json编码常量
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:39:45 周二
 */
function returnJson($anything, $option = JSON_UNESCAPED_SLASHES){
    echo json_encode($anything, $option);
}

function returnJsonMessage($anything, $type = 'success', $option = JSON_UNESCAPED_SLASHES ){
    switch ($type){
        case 'success':
            $success = true;
            $errorCode = 0;
            break;
        case 'error':
            $success = false;
            $errorCode = -1;
            break;
        default :
            $success = false;
            $errorCode = -1;
    }
    $result = [
        'body' => '',
        'message' => $anything,
        'errorCode' => $errorCode,
        'success' => $success,
    ];
    echo json_encode($result, $option);
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

/**
 * @doc 将数组转换为按某个字段作为索引的数组
 * @param $array array 要转换的数组
 * @param $key string 哪个字段作为索引key
 * @param array $fields 哪些字段存储为索引值，为空则表示全部存储
 * @param $convertToCamel string 是否转为驼峰形式，key-索引字段值|fields-存储字段|all-全部
 * @return array
 * @author Heanes
 * @time 2016-10-23 19:18:45 周日
 */
function getKeyValueMapFromArray($array, $key, $fields = [], $convertToCamel){
    $targetArray = [];
    foreach ($array as $index => $item) {
        if(array_key_exists($key, $item)){
            $tempArray = [];
            if($fields == null || $fields == []){
                $tempArray = $item;
            }else if(count($fields) == 1){
                // 若字段只有一个则只存储该字段值
                $tempArray = $item[$fields[0]];
            }else{
                foreach ($fields as $field){
                    if(array_key_exists($field, $item)){
                        $tempArray[$field] = $item[$field];
                    }
                }
            }
            $targetArrayKey = $item[$key];
            if($convertToCamel == 'key' || $convertToCamel == 'all'){
                $targetArrayKey = convertToCamelStyle($targetArrayKey);
            }
            $targetArray[$targetArrayKey] = $tempArray;
        }
    }
    return $targetArray;
}