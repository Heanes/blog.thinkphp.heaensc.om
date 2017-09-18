<?php
/**
 * @doc Admin公共部分控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-04 19:42:33 周一
 */
namespace Admin\Controller;
defined('InHeanes') or die('Access denied!');
use Think\Controller;
use Common\Model\SettingCommonModel;
use Common\Component\Page;

require_once(APP_PATH.'Common/utils/func/utils.php');
class BaseAdminController extends Controller{
    
    /**
     * @var array 前台公共输出数据
     */
    protected $commonOutput;

    /**
     * @var string 公共排除字段
     */
    protected $commonExceptFields = 'is_enable,is_deleted,access_password,create_time,update_time,create_user,update_user';

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

        // 获取设置
        $this->commonOutput['common']['settingCommon'] = getKeyValueMapFromArray($this->getSettingCommon(), 'code', ['storedValue'], 'key');
        // 定义主题
        $this->getTheme();
        // 通用标题后缀
        $this->commonOutput['common']['titleCommonSuffix'] = ' - 管理后台 - Heanes的博客';
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
        return $settingCommonListCamelStyle;
    }
    
    /**
     * @doc 获取数据库设置的主题功能
     * @author Heanes fang <heanes@163.com>
     * @time 2016-10-30 23:06:38 周日
     */
    public function getTheme() {
        if($this->commonOutput == null){
            die('未初始化设置，请设置');
        }
        $defaultTheme = $this->commonOutput['common']['settingCommon']['webThemeAdmin'] ?: WEB_THEME_ADMIN_DEFAULT;
        C('DEFAULT_THEME', $defaultTheme);
        define('TPL', '/application/admin/view/'. $defaultTheme);
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
    
    /**
     * @doc 检查登录
     * @author Heanes
     * @time 2016-10-30 23:35:44 周日
     */
    public function checkLogin() {
        if(!isset($_SESSION['isLoginAdmin']) && $_SESSION['isLoginAdmin'] != SYS_ADMIN_LOGIN_IN_FLAG){
            $this->redirect('adminUser/login');
        }
    }
}