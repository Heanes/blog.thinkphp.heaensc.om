<?php
/**
 * @doc 前台模块公共控制器部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 13:34:51 周二
 */

namespace Index\Controller;

use Common\Service\FriendLinkService;
use Common\Service\NavigationService;
use Common\Service\SettingCommonService;
use Common\utils\Server;
use Think\Controller;

require_once(APP_PATH . 'Common/utils/func/utils.php');

class BaseIndexController extends Controller {

    /**
     * @var array 前台公共输出数据
     */
    protected $commonOutput;

    /**
     * @var array 分页
     */
    protected $pager;

    /**
     * @var SettingCommonService 网站公用设置服务
     */
    private $settingCommonService;

    /**
     * @var NavigationService 导航服务
     */
    private $navigationService;

    /**
     * @var FriendLinkService 友情链接服务
     */
    private $friendLinkService;

    function __construct() {
        parent::__construct();
        // 获取设置
        $this->commonOutput['common']['settingCommon'] = getKeyValueMapFromArray($this->getSettingCommon(), 'code', ['storedValue'], 'key');
        // 定义主题
        $this->getTheme();
        // 获取导航
        $this->commonOutput['common']['navigationList'] = $this->getNavigation();
        // 获取友情链接
        $this->commonOutput['common']['friendLinkList'] = $this->getFriendlyLink();
        // 通用标题后缀
        $this->commonOutput['common']['titleCommonSuffix'] = $this->commonOutput['common']['settingCommon']['webTitle'];


        // 其他数据
        $this->commonOutput['currentUrl'] = Server::getCurrentUrl();

        // 分页
        $this->initPager();

        //print_r($_SERVER);
    }

    /**
     * @doc 获取导航数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getNavigation() {
        $this->navigationService = new NavigationService();
        $param['where'] = $this->getCommonShowDataSelectParam();
        $navigationList = $this->navigationService->getList($param);
        return $navigationList;
    }

    /**
     * @doc 获取设置数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getSettingCommon() {
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
            'pagePramName'     => $this->commonOutput['settingCommon']['request_page_param_name'] ?: REQUEST_PAGE_PARAM_NAME_DEFAULT,
            'pageSizePramName' => $this->commonOutput['settingCommon']['request_page_size_param_name'] ?: REQUEST_PAGE_SIZE_PARAM_NAME_DEFAULT,
            'pageSizeDefault'  => $this->commonOutput['settingCommon']['data_list_page_size'] ?: DATA_LIST_PAGE_SIZE_DEFAULT,
        ];
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
     * @time 2016-06-21 14:04:16 周二
     */
    public function getTheme() {
        if ($this->commonOutput == null) {
            die('未初始化设置，请设置');
        }
        $defaultTheme = $this->commonOutput['common']['settingCommon']['webThemeHome'] ?: WEB_THEME_HOME_DEFAULT;
        define('TPL', '/application/index/view/' . $defaultTheme);
        C('DEFAULT_THEME', $defaultTheme);
    }

    /**
     * @doc 获取友情链接
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:18:33 周二
     */
    public function getFriendlyLink() {
        $this->friendLinkService = new FriendLinkService();
        $param['where'] = $this->getCommonShowDataSelectParam();
        $friendLinkList = $this->friendLinkService->getList($param);

        return $friendLinkList;
    }

    /**
     * @doc 检测当前path于请求的方法匹配
     * @author Heanes
     * @param $url
     */
    public function isCurrentPath($url) {
        ;
    }

    /**
     * @doc 解析查询参数
     * @param array $param 参数
     * @author Heanes
     * @time 2016-10-24 11:33:16 周一
     */
    public function parseParam($param = []) {

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