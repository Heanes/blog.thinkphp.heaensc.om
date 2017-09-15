<?php
/**
 * @doc 基础服务
 * @author Heanes
 * @time 2017-09-10 19:56:43 周日
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

use Common\Model\BaseModel;

class BaseService{

    /**
     * @var BaseModel baseModel
     */
    private $model;

    /**
     * @var string model类型
     */
    private $modelName;

    /**
     * @var string model类型
     */
    private $name;

    /**
     * @var boolean 是否已经初始化
     */
    private $isInitialized;

    /**
     * @var array 网站公用设置数据保存
     */
    private $settingCommon;

    /**
     * @var SettingCommonService 网站共用设置服务
     */
    private $settingCommonService;

    function __construct() {
        $this->getModelName();
    }

    public function getList($param = []) {
        $dataListRaw = $this->model->getList($param);
        $dataListCamelStyle = convertToCamelStyle($dataListRaw);
        return $dataListCamelStyle;
    }

    /**
     * @doc 初始化
     * @return $this
     * @author Heanes
     * @time 2017-09-12 14:45:32 周二
     */
    function init(){
        if($this->isInitialized) return $this;

        $this->initSettingCommon();

        $this->isInitialized = true;
        return $this;
    }

    /**
     * 得到当前的数据对象名称
     * @access public
     * @return string
     */
    public function getModelName() {
        if(empty($this->modelName)){
            $name = substr(get_class($this),0, -strlen('Service'));
            if ( $pos = strrpos($name,'\\') ) {//有命名空间
                $this->name = substr($name,$pos+1);
            }else{
                $this->name = $name;
            }
        }
        $this->model = new BaseModel($this->name);
        $this->modelName = $this->name . C('DEFAULT_M_LAYER');
        return $this->modelName;
    }

    /**
     * @doc 初始化settingCommon相关
     * @return $this
     * @author Heanes
     * @time 2017-09-12 14:45:07 周二
     */
    function initSettingCommon(){
        if(!$this->settingCommonService){
            $this->settingCommonService = new SettingCommonService();
        }
        if(!$this->settingCommon){
            $this->settingCommon = $this->settingCommonService->getSettingCommon();
        }
        return $this;
    }

    /**
     * @doc 定义设置相关的常量
     * @return $this
     * @author Heanes
     * @time 2017-09-12 14:46:21 周二
     */
    function defineSettingConstants(){
        $this->init();
        $settingCommonListCamelStyle = $this->settingCommon;
        // 日期格式化
        define('DATE_FORMATIVE', $settingCommonListCamelStyle['dateTimeFormative'] ?: DATE_FORMATIVE_DEFAULT);
        // 时间格式化
        define('DATE_TIME_FORMATIVE', $settingCommonListCamelStyle['dateTimeFormative'] ?: DATE_TIME_FORMATIVE_DEFAULT);
        // 首页显示文章条数
        define('HOME_ARTICLE_NUM', $settingCommonListCamelStyle['homeArticleNum'] != null ?: HOME_ARTICLE_NUM_DEFAULT);
        // 文章分页大小
        define('ARTICLE_LIST_PAGE_SIZE', $settingCommonListCamelStyle['articleListPageSize'] != null ?: ARTICLE_LIST_PAGE_SIZE_DEFAULT);
        // 分页参数名
        define('REQUEST_PAGE_PARAM_NAME', $settingCommonListCamelStyle['requestPageParamName'] != null ?: REQUEST_PAGE_PARAM_NAME_DEFAULT);
        return $this;
    }

    /**
     * @doc 将时间戳格式化为字符型日期时间
     * @param $timeStamp int 时间戳
     * @param $formatStr string 格式化字符
     * @return false|string 格式化后的时间
     */
    public function formatDate($timeStamp, $formatStr){
        $formatStr = $formatStr != null ? $formatStr : $this->getSettingDateFormatStr();
        return date($formatStr, $timeStamp);
    }
    /**
     * @doc 将时间戳格式化为字符型日期
     * @param $timeStamp int 时间戳
     * @param $formatStr string 格式化字符
     * @return false|string 格式化后的时间
     */
    public function formatDateTime($timeStamp, $formatStr){
        $formatStr = $formatStr != null ? $formatStr : $this->getSettingDateFormatStr();
        return date($formatStr, $timeStamp);
    }

    /**
     * @doc 获取日期格式化的格式化字符
     * @return string 时间格式化的格式化字符，如 'Y-m-d H:i:s'
     * @author Heanes
     * @time 2017-09-12 10:59:42周二
     */
    public function getSettingDateFormatStr(){
        $this->init();
        return defined('DATE_FORMATIVE') ? DATE_FORMATIVE : 'Y-m-d';
    }

    /**
     * @doc 获取时间格式化的格式化字符
     * @return string 时间格式化的格式化字符，如 'Y-m-d H:i:s'
     * @author Heanes
     * @time 2017-09-12 10:59:42周二
     */
    public function getSettingDateTimeFormatStr(){
        $this->init();
        return defined('DATE_TIME_FORMATIVE') ? DATE_TIME_FORMATIVE : 'Y-m-d H:i:s';
    }

    /**
     * @doc 获取公共的查询条件
     * @return array
     * @author Heanes
     * @time 2016-11-13 16:09:36 周日
     */
    public function getCommonShowDataSelectParam() {
        return [
            'is_enable'  => 1,
            'is_deleted' => 0,
        ];
    }

    /**
     * @doc 获取网站共用设置
     * @return array|null|string 网站共用设置
     * @author Heanes
     * @time 2017-09-12 10:58:39 周二
     */
    public function getSettingCommon(){
        $this->init();
        return $this->settingCommon;
    }

}