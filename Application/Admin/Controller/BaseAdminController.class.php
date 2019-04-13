<?php
/**
 * @doc Admin公共部分控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-07-04 19:42:33 周一
 */
namespace Admin\Controller;
defined('InHeanes') or die('Access denied!');

use Common\Service\SettingCommonService;
use Think\Controller;
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
     * @var SettingCommonService 公共设置模型
     */
    protected $settingCommonService;

    function __construct() {
        parent::__construct();

        // 获取设置
        $this->commonOutput['common']['settingCommon'] = getKeyValueMapFromArray($this->getSettingCommon(), 'code', ['storedValue'], 'key');
        // 定义主题
        $this->getTheme();
        // 通用标题后缀
        $this->commonOutput['common']['titleCommonSuffix'] = ' - 管理后台 - ' . $this->commonOutput['common']['settingCommon']['webTitle'];

        // 分页
        $this->initPager();
    }

    /**
     * @doc 获取公共设置
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-23 12:26:07 周四
     */
    protected function getSettingCommon() {
        $this->settingCommonService = new SettingCommonService();
        $param['where'] = $this->getCommonShowDataSelectParam();
        $settingCommonList = $this->settingCommonService->getSettingCommon($param);
        // 日期格式化
        define('DATE_FORMATIVE', $settingCommonList['dateTimeFormative'] ?: DATE_FORMATIVE_DEFAULT);
        // 时间格式化
        define('DATE_TIME_FORMATIVE', $settingCommonList['dateTimeFormative'] ?: DATE_TIME_FORMATIVE_DEFAULT);
        // 首页显示文章条数
        define('HOME_ARTICLE_NUM', $settingCommonList['homeArticleNum'] != null ?: HOME_ARTICLE_NUM_DEFAULT);
        // 文章分页大小
        define('ARTICLE_LIST_PAGE_SIZE', $settingCommonList['articleListPageSize'] != null ?: ARTICLE_LIST_PAGE_SIZE_DEFAULT);
        // 分页参数名
        define('REQUEST_PAGE_PARAM_NAME', $settingCommonList['requestPageParamName'] != null ?: REQUEST_PAGE_PARAM_NAME_DEFAULT);
        return $settingCommonList;
    }

    /**
     * @doc 初始化分页相关数据
     */
    private function initPager() {
        $this->pager = [
            'pagePramName'     => $this->commonOutput['common']['settingCommon']['requestPageParamName'] ?: REQUEST_PAGE_PARAM_NAME_DEFAULT,
            'pageSizePramName' => $this->commonOutput['common']['settingCommon']['requestPageSizeParamName'] ?: REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT,
            'pageSizeDefault'  => $this->commonOutput['common']['settingCommon']['dataListPageSize'] ?: DATA_LIST_PAGE_SIZE_DEFAULT,
        ];
        // 配置分页参数
        C('VAR_PAGE', $this->pager['pagePramName']);
    }

    /**
     * @doc 获取分页参数数组
     * @author Heanes
     * @time 2017-09-11 13:08:32 周一
     */
    public function getPageParamArray() {
        $pageNumber = I('request.' . $this->pager['pagePramName'], 1, 'int');
        $pageSize = I('request.' . $this->pager['pageSizePramName'], $this->pager['pageSizeDefault'], 'int');
        return [
            'pageNumber' => $pageNumber,
            'pageSize'   => $pageSize,
        ];
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
     * @doc 检查登录
     * @author Heanes
     * @time 2016-10-30 23:35:44 周日
     */
    public function checkLogin() {
        if(!isset($_SESSION['isLoginAdmin']) && $_SESSION['isLoginAdmin']['flag'] != SYS_ADMIN_LOGIN_IN_FLAG){
            return false;
        }
        return true;
    }

    public function handleLoginStatus() {
        if(!$this->checkLogin()){
            $this->redirect('login');
        }
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
}