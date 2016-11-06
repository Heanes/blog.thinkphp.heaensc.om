<?php
/**
 * @doc Admin默认控制器
 * @author Heanes <heanes@163.com>
 * @time 2016-07-04 19:42:23 周一
 */
namespace Admin\Controller;
defined('InHeanes') or die('Access denied!');
class IndexController extends BaseAdminController {
    
    private $output;
    
    function __construct(){
        parent::__construct();
        $this->output = $this->commonOutput;
        $this->checkLogin();
    }

    /**
     * @doc Admin默认方法
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:52:32 周二
     */
    public function indexOp(){
        $output['title'] = '后台管理起始页';
        $this->assign('output', $output);
        $this->display('layout/home');
    }
}