<?php
/**
 * @doc 网站设置服务
 * @author Heanes
 * @time 2017-09-12 10:33:29 周二
 */

namespace Common\Service;
defined('InHeanes') or die('Access denied!');

use Common\Model\SettingCommonModel;
require_once(APP_PATH.'Common/utils/func/utils.php');

class SettingCommonService extends BaseService {

    /**
     * @var SettingCommonModel 通用设置的Model类
     */
    private $settingCommonModel;

    function __construct() {
        parent::__construct();

        $this->settingCommonModel = new SettingCommonModel();
    }


    /**
     * @doc 获取设置数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getSettingCommon() {
        $settingCommonList = $this->settingCommonModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $settingCommonListCamelStyle = convertToCamelStyle($settingCommonList);
        return $settingCommonListCamelStyle;
    }
}