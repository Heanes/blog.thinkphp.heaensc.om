<?php
/**
 * @doc 管理员用户
 * @filesource AdminUserController.class.php
 * @copyright heanes.com
 * @author Heanes
 * @time 2016-10-30 22:48:37 周日
 */
namespace Admin\Controller;
defined('InHeanes') or exit('Access Invalid!');
class AdminUserController extends BaseAdminController {
    
    private $output;
    
    function __construct(){
        parent::__construct();
        $this->output = $this->commonOutput;
    }
    
    /**
     * @doc Admin默认方法
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:52:32 周二
     */
    public function indexOp(){
        ;
    }
    
    /**
     * @doc 登录页面
     * @author Heanes
     * @time 2016-10-30 23:27:28 周日
     */
    public function loginOp() {
        $this->display('layout/login');
    }
    
    /**
     * @doc 生成验证码
     * @author Heanes
     * @time 2016-10-30 23:28:59 周日
     */
    public function getCaptchaOp(){
        $config =    array(
            'fontSize' => 30,    // 验证码字体大小
            'length'   => 4,     // 验证码位数
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
}

