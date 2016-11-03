<?php
/**
 * @doc 前台模块公共控制器部分
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 13:34:51 周二
 */
namespace Home\Controller;
use Think\Controller;

require_once(APP_PATH.'Common/utils/func/utils.php');
use Common\Model\NavigationModel;
use Common\Model\SettingCommonModel;
use Common\Model\FriendLinkModel;
class BaseHomeController extends Controller{
    
    /**
     * @var array 前台公共输出数据
     */
    protected $commonOutput;

    /**
     * @var SettingCommonModel 公共设置模型
     */
    private $settingCommonModel;
    
    /**
     * @var NavigationModel 导航模型
     */
    private $navigationModel;

    /**
     * @var FriendLinkModel 友情链接模型
     */
    private $friendLinkModel;

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
        $this->commonOutput['common']['titleCommonSuffix'] = ' - Heanes的博客';
    }

    /**
     * @doc 获取导航数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getNavigation() {
        $this->navigationModel = new NavigationModel();
        $navigationListRaw = $this->navigationModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $navigationListCamelStyle = convertToCamelStyle($navigationListRaw);
        return $navigationListCamelStyle;
    }

    /**
     * @doc 获取设置数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getSettingCommon() {
        $this->settingCommonModel = new SettingCommonModel();
        $settingCommonList = $this->settingCommonModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $settingCommonListCamelStyle = convertToCamelStyle($settingCommonList);
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
        return $settingCommonListCamelStyle;
    }

    /**
     * @doc 获取数据库设置的主题功能
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:04:16 周二
     */
    public function getTheme() {
        if($this->commonOutput == null){
            die('未初始化设置，请设置');
        }
        $defaultTheme = $this->commonOutput['common']['settingCommon']['webThemeHome'] ?: WEB_THEME_HOME_DEFAULT;
        define('TPL', '/application/home/view/'. $defaultTheme);
        C('DEFAULT_THEME', $defaultTheme);
    }

    /**
     * @doc 获取友情链接
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:18:33 周二
     */
    public function getFriendlyLink() {
        $this->friendLinkModel = new FriendLinkModel();
        $friendLinkList = $this->friendLinkModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $friendLinkListCamelStyle = convertToCamelStyle($friendLinkList);
        return $friendLinkListCamelStyle;
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
    public function parseParam($param = []){

    }
}