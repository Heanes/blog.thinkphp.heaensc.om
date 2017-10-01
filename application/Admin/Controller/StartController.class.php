<?php
/**
 * @doc admin登录后欢迎页
 * @author Heanes <heanes@163.com>
 * @time 2017-10-01 20:19:43 周天
 */
namespace Admin\Controller;
defined('InHeanes') or die('Access denied!');
class StartController extends BaseAdminController {
    
    private $output;
    
    function __construct(){
        parent::__construct();
        $this->output = $this->commonOutput;
        $this->checkLogin();
    }
    
    /**
     * @doc Admin默认方法
     * @author Heanes <heanes@163.com>
     * @time 2016-11-06 17:43:18 周日
     */
    public function indexOp(){
        $output['title'] = '后台管理欢迎页';
        $this->assign('output', $output);
        $this->display('index/start');
    }
}