<?php
/**
 * @doc Admin公共部分控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-04 19:42:33 周一
 */
namespace Admin\Controller;
defined('inHeanes') or die('Access denied!');
use Think\Controller;
use Common\Model\SettingCommonModel;
use Common\Component\Page;

require_once(APP_PATH.'Common/utils/func/utils.php');
class BaseAdminController extends Controller{

    /**
     * @var string 公共排除字段
     */
    protected $commonExceptFields = 'is_enable,is_deleted,access_password,insert_time,update_time,create_user,update_user';

    /**
     * @var string 安全性字段
     */
    protected $secretFields = 'access_password,pwd,password';

    /**
     * @var SettingCommonModel 公共设置模型
     */
    protected $settingCommonModel;

    function __construct() {
        parent::__construct();

        $this->settingCommonModel = new SettingCommonModel();
    }

    /**
     * @doc 获取公共设置
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-23 12:26:07 周四
     */
    protected function getSettingCommon() {
        $this->settingCommonModel = new SettingCommonModel();
        $settingCommonList = $this->settingCommonModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $settingCommonListCamelStyle = convertToCamelStyle($settingCommonList);
        // 日期格式化
        define('DATE_FORMATIVE', $settingCommonListCamelStyle['dateTimeFormative'] ? $settingCommonListCamelStyle['dateTimeFormative'] : DATE_FORMATIVE_DEFAULT);
        // 时间格式化
        define('DATE_TIME_FORMATIVE', $settingCommonListCamelStyle['dateTimeFormative'] ? $settingCommonListCamelStyle['dateTimeFormative'] : DATE_TIME_FORMATIVE_DEFAULT);
        // 首页显示文章条数
        define('HOME_ARTICLE_NUM', $settingCommonListCamelStyle['homeArticleNum'] != null ? $settingCommonListCamelStyle['homeArticleNum'] : HOME_ARTICLE_NUM_DEFAULT);
        // 数据分页大小
        define('DATA_LIST_PAGE_SIZE', $settingCommonListCamelStyle['articleListPageSize'] != null ? $settingCommonListCamelStyle['articleListPageSize'] : ARTICLE_LIST_PAGE_SIZE_DEFAULT);
        // 定义主题
        define('TPL', '/application/admin/view/'. $settingCommonListCamelStyle['webThemeAdmin']);
        return $settingCommonListCamelStyle;
    }

    /**
     * @doc 获取设置里的分页大小
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-23 10:30:33 周四
     */
    protected function getPageCondition() {
        $settingOriginResult = $this->getSettingCommon();
        $page = new Page();
    }
}