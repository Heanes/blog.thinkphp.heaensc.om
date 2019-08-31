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
function returnJson($anything, $option = JSON_UNESCAPED_UNICODE){
    echo json_encode($anything, $option);
}

function returnJsonMessage($msg, $type = 'success', $option = JSON_UNESCAPED_SLASHES ){
    switch ($type){
        case 'success':
            $errorCode = 0;
            break;
        case 'error':
            $errorCode = -1;
            break;
        default :
            $errorCode = -1;
    }

    $dateTimeStr = '';
    try {
        $dateTime = new \DateTime();
        $dateTimeStr = $dateTime->format('Y-m-d H:i:s');
    } catch (\Exception $e) {
        ;
    }
    $result = [
        'data' => null,
        'msg' => $msg,
        'code' => $errorCode,
        'responseDateTime' => $dateTimeStr
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
 * @doc 返回标准结果或者驼峰结果
 * @param $result string 数据
 * @param $resultStyle string 结果风格
 * @return array|string|null
 * @author Heanes
 * @time 2019-04-06 11:03:55 周六
 */
function toStyleResult($result, $resultStyle) {
    $returnResult = $resultStyle == RESULT_STYLE_CAMEL ? convertToCamelStyle($result) : $result;
    return $returnResult;
}

/**
 * @doc 返回数据或空对象
 * @param $data
 * @return object
 * @author Heanes
 * @time 2019-04-07 11:56:57 周日
 */
function dataOrNullObject($data = null){
    return $data ?: nullObject();
}

/**
 * @doc 获取空对象
 * @return object
 * @author Heanes
 * @time 2019-04-07 12:48:08 周日
 */
function nullObject(){
    /*$obj1 = new \stdClass; // Instantiate stdClass object
    $obj2 = new class{}; // Instantiate anonymous class
    $obj3 = (object)[]; // Cast empty array to object

    var_dump($obj1); // object(stdClass)#1 (0) {}
    var_dump($obj2); // object(class@anonymous)#2 (0) {}
    var_dump($obj3); // object(stdClass)#3 (0) {}*/
    return (object)[];
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
function getKeyValueMapFromArray($array, $key, $fields = [], $convertToCamel = 'all'){
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

// ---------------------------------------------- 输入相关 ----------------------------------------------------
/**
 * @doc 获取提交数据
 * @param null $key 字段名
 * @return mixed
 * @author Heanes
 * @time 2019-04-13 12:49:05 周六
 */
function getRequestParam($key = null){
    // 如果是post且content-type为json
    $contentType = $_SERVER['CONTENT_TYPE'];
    if(stristr($contentType, 'application/json')){
        $requestAll = json_decode(file_get_contents('php://input'), true);
    }else{
        $requestAll = $_REQUEST;
    }
    // todo 考虑同时存在get参数时，合并参数
    return $key != null ? $requestAll[$key] : $requestAll;
}

// ---------------------------------------------- 安全相关 ----------------------------------------------------
/**
 * @doc 加密算法
 * @param $password
 * @return string
 * @author Heanes
 * @time 2016-10-31 17:54:34 周一
 */
function encryptPassword($password){
    return md5($password);
}

// ---------------------------------------------- 数据相关 ----------------------------------------------------
$normalArray = [
    [
        'id'       => 1,
        'parentId' => 0,
        'name'     => '分类1',
    ],
    [
        'id'       => 2,
        'parentId' => 0,
        'name'     => '分类2',
    ],
    [
        'id'       => 3,
        'parentId' => 1,
        'name'     => '分类1.1',
    ],
    [
        'id'       => 4,
        'parentId' => 1,
        'name'     => '分类1.2',
    ],
    [
        'id'       => 5,
        'parentId' => 2,
        'name'     => '分类2.1',
    ],
    [
        'id'       => 6,
        'parentId' => 2,
        'name'     => '分类2.2',
    ],
    [
        'id'       => 7,
        'parentId' => 4,
        'name'     => '分类1.2.1',
    ],
    [
        'id'       => 8,
        'parentId' => 7,
        'name'     => '分类1.2.1.1',
    ],

];
/**
 * todo 2017-09-15 10:44:28 周五 还未自己原创完成，还要完成findParent(),findChild()
 * @doc 将平级数组转换为树形结构，默认parentId值为0或者空的表示为根节点
 * 0. 校验数据发现异常：
 *    1. duplicated key 传入数组有重复主键
 *    2. invalid key 传入数组元素没有主键
 *    3. invalid parentKey 传入数组元素没有关联父主键
 * @param array $array
 * @param string $key 主键
 * @param string $parentKey 与主键关联的父主键
 * @param string $childrenKey 生成的孩子的键名
 * @return array
 * @author Heanes
 * @time 2017-09-15 10:21:54 周五
 */
function generateTree($array = [], $key = 'id', $parentKey = 'parentId', $childrenKey = 'children'){
    // 0. [校验原始数据]，先校验传入数组与参数
    //throw new Exception("传入数组有重复主键");
    $treeArray = [];
    // 1. 先根据parentId排序，最小的一定为一级
    foreach ($array as $index => $item) {
        ;
    }
    return $treeArray;
}

/**
 * @doc 查找父链
 * @param array $array
 * @param mixed $searchValue 要查找的值
 * @param string $key
 * @param string $parentKey
 * @return array
 * @author Heanes
 * @time 2017-09-15 11:19:01 周五
 */
function findParent($array = [], $searchValue, $key = 'id', $parentKey = 'parentId'){
    $arrayIndexByKey = arrayToKeyIndex($array, $key);
    function _findParent($arrayIndexByKey = [], $searchValue, $key = 'id', $parentKey = 'parentId'){
        $parentOne = $arrayIndexByKey[$searchValue];
        $parents[] = $parentOne;
        if($parentOne[$parentKey] == '' || $parentOne[$parentKey] == 0 || $arrayIndexByKey[$parentOne[$parentKey]] == null){
        }else{
            $temp = _findParent($arrayIndexByKey, $parentOne[$parentKey], $key, $parentKey);
            foreach ($temp as $index => $item) {
                $parents[] = $item;
            }
        }
        return $parents;
    }
    $parents = _findParent($arrayIndexByKey, $searchValue, $key, $parentKey);
    // 逆转
    return array_reverse($parents);
}

//print_r('findParent:');
//print_r(findParent($normalArray, 8));


/**
 * @doc 查找子孙链
 * @param array $array
 * @param mixed $searchValue 要查找的值
 * @param string $key
 * @param string $parentKey
 * @param string $childrenKey
 * @return mixed
 * @author Heanes
 * @time 2017-09-15 18:32:06 周五
 */
function findChildren($array = [], $searchValue, $key = 'id', $parentKey = 'parentId', $childrenKey = 'children'){
    $arrayIndexByKey = arrayToKeyIndex($array, $key);
    $arrayGroupByParentKey = arrayGroup($array, $parentKey);

    function _findChildren($arrayIndexByKey = [], $arrayGroupByParentKey = [], $searchValue, $key = 'id', $parentKey = 'parentId', $childrenKey = 'children'){
        $current = $arrayIndexByKey[$searchValue];
        $childrens = $arrayGroupByParentKey[$current[$parentKey]];
        $current[$childrenKey] = $childrens;
        foreach ($childrens as $index => $item) {
            if($arrayGroupByParentKey[$item[$parentKey]] != null){
                _findChildren($arrayIndexByKey, $arrayGroupByParentKey, $item[$key], $key, $parentKey);
            }
        }
        return $childrens;
    }
    $childrens = _findChildren($arrayIndexByKey, $arrayGroupByParentKey, $searchValue, $key, $parentKey, $childrenKey);
    return $childrens;
}
//print_r('findChildren:');
//print_r(findChildren($normalArray, 8));
//exit;

/**
 * @doc 根据数组指定键来对数组进行索引
 * @param array $array 源数组
 * @param string $key 键名
 * @return array
 * @author Heanes
 * @time 2017-09-15 11:34:38 周五
 */
function arrayToKeyIndex($array = [], $key = 'id'){
    $indexArray = [];
    array_map(function ($item) use ($key, &$indexArray){
        $indexArray[$item[$key]] =  $item;
    }, $array);
    return $indexArray;
}

/**
 * @doc 根据指定键分组
 * @param array $array
 * @param string $key 指定要分组的key
 * @return array
 * @author Heanes
 * @time 2017-09-15 19:10:04 周五
 */
function arrayGroup($array = [], $key = 'id'){
    $group = [];
    array_map(function ($item) use ($key, &$group){
        if($item[$key] != null)
        $group[$item[$key]][] =  $item;
    }, $array);
    return $group;
}
//var_dump(arrayToKeyIndex($normalArray));
//generateTree($normalArray);

/**
 * 数组根据父id生成树
 * @see http://chen498402552-163-com.iteye.com/blog/1853778
 * @see list_to_tree http://blog.csdn.net/luxiuwen/article/details/37602391
 * @staticvar int $depth 递归深度
 * @param array $data 数组数据
 * @param integer $pid 父id的值
 * @param string $key id在$data数组中的键值
 * @param string $chrildKey 要生成的子的键值
 * @param string $pKey 父id在$data数组中的键值
 * @param int $maxDepth 最大递归深度，防止无限递归
 * @return array 重组后的数组
 */
function getTree($data, $pid = 0, $key = 'id', $pKey = 'parentId', $childKey = 'child', $maxDepth = 0){
    static $depth = 0;
    $depth++;
    if (intval($maxDepth) <= 0)
    {
        $maxDepth = count($data) * count($data);
    }
    if ($depth > $maxDepth)
    {
        exit("error recursion:max recursion depth {$maxDepth}");
    }
    $tree = array();
    foreach ($data as $rk => $rv)
    {
        if ($rv[$pKey] == $pid)
        {
            $rv[$childKey] = getTree($data, $rv[$key], $key, $pKey, $childKey, $maxDepth);
            $tree[] = $rv;
        }
    }
    return $tree;
}
//var_dump(getTree($normalArray));
//exit;
