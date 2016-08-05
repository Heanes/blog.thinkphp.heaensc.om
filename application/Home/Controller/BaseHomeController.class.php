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
class BaseHomeController extends Controller{
    
    /**
     * @var array 前台公共输出数据
     */
    protected $commonOutput;
    
    /**
     * @var NavigationModel 导航模型
     */
    private $navigationModel;

    function __construct() {
        parent::__construct();
        $this->navigationModel = new NavigationModel();
        // 获取主题
        $this->getTheme();
        $this->commonOutput['common']['navigationList'] = $this->getNavigation();
        // 通用标题后缀
        $this->commonOutput['common']['titleCommonSuffix'] = ' - Heanes的博客';
    }

    /**
     * @doc 获取数据库设置的主题功能
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:04:16 周二
     */
    public function getTheme() {
        define('TPL', '/application/home/view/default');
    }

    /**
     * @doc 获取导航数据
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:17:45 周二
     */
    public function getNavigation() {
        $navigationListRaw = $this->navigationModel
            ->where('is_enable = 1 and is_deleted = 0')
            ->select();
        $navigationListCamelStyle = convertToCamelStyle($navigationListRaw);
        return $navigationListCamelStyle;
    }

    /**
     * @doc 获取友情链接
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:18:33 周二
     */
    public function getFriendlyLink() {
        ;
    }
    
    /**
     * @doc 检测当前path于请求的方法匹配
     * @author Heanes
     * @param $url
     */
    public function isCurrentPath($url) {
        ;
    }
}