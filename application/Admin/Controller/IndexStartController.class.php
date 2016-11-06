<?php
/**
 * @doc Admin默认控制器
 * @author Heanes <heanes@163.com>
 * @time 2016-11-06 17:41:51 周日
 */
namespace Admin\Controller;
defined('InHeanes') or die('Access denied!');
class IndexStartController extends BaseAdminController {
    
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
        $this->display('layout/start');
    }
}