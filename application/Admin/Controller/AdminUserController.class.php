<?php
/**
 * @doc 管理员用户
 * @filesource AdminUserController.class.php
 * @copyright heanes.com
 * @author Heanes
 * @time 2016-10-30 22:48:37 周日
 */
namespace Admin\Controller;
use \Common\Model\AdminUserModel;
defined('InHeanes') or exit('Access Invalid!');
class AdminUserController extends BaseAdminController {
    
    private $adminUserModel;
    
    function __construct(){
        parent::__construct();
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
        var_dump($_SESSION);
        $this->display('layout/login');
    }
    
    /**
     * @doc 退出登录
     * @author Heanes
     * @time 2016-10-31 18:34:26 周一
     */
    public function doLoginOutOp() {
        unset($_SESSION['isLoginAdmin']);
    }

    /**
     * @doc 登录提交
     * @author Heanes
     * @time 2016-10-31 16:39:03 周一
     */
    public function doLoginOp() {
        $postAdminName = I('request.adminName', '', 'string');
        var_dump($postAdminName);
        $postAdminPassword = I('request.adminPassword', '', 'string');
        var_dump($postAdminPassword);
        $postAdminCaptcha = I('request.adminCaptcha', '', 'string');
        var_dump($postAdminCaptcha);
        exit;
        $result = [];
        if(!$this->checkLoginParam($result, $postAdminName, $postAdminPassword, $postAdminCaptcha)){
            var_dump($result);echo 'fdas';exit;
            returnJson($result);
            return false;
        }
        // 检查验证码
        if($this->checkAdminCaptcha()){
            $this->adminLogin($result, $postAdminName, $postAdminPassword);
            returnJson($result);
            $this->redirect('');
            return true;
        }else{
            returnJson($result);
            return false;
        }
    }
    
    /**
     * @doc 管理员登录
     * @author Heanes
     * @time 2016-10-31 16:56:13 周一
     */
    private function adminLogin(&$result, $adminName, $adminPassword) {
        $result['message'] = '';
        $result['success'] = false;
        $this->adminUserModel = new AdminUserModel();
        $adminUserRaw = $this->adminUserModel
            ->where("user_name = '${adminName}' and is_deleted = 0")
            ->find();
        if($adminUserRaw == null || $adminUserRaw == [] || $adminUserRaw == ''){
            $result['message'] = "用户${adminName}不存在";
            return $result;
        }
        if($adminUserRaw['user_pwd'] != encryptPassword($adminPassword)){
            $result['message'] = "密码不正确";
            return $result;
        }
        if($adminUserRaw['is_enable'] != 1){
            $result['message'] = "用户${adminName}已被禁用";
            return $result;
        }
        $adminUserCamelStyle = convertToCamelStyle($adminUserRaw);
        $_SESSION['isLoginAdmin']['flag'] = SYS_ADMIN_LOGIN_IN_FLAG;
        $_SESSION['isLoginAdmin']['admin'] = $adminUserCamelStyle;
        $result['body'] = $adminUserCamelStyle;
        $result['success'] = true;
        return $result;
    }
    
    /**
     * @doc 检查登录验证码
     * @return bool
     * @author Heanes
     * @time 2016-10-31 17:36:09 周一
     */
    private function checkAdminCaptcha() {
        return true;
    }
    
    /**
     * @doc 检查登录参数
     * @param $result
     * @param $adminName string 账户名
     * @param $adminPassword string 密码
     * @param $adminCaptcha string 验证码
     * @return bool 检查结果
     * @author Heanes
     * @time 2016-10-31 16:50:06 周一
     */
    private function checkLoginParam(&$result, $adminName, $adminPassword, $adminCaptcha){
        $result['message'] = '检查登录参数中';
        $checkResult = true;
        $messageArray = [];
        if($adminName == null || $adminName == ''){
            $messageArray[] = '账户名为空！';
            $checkResult = false;
        }
        if($adminPassword == null || $adminPassword == ''){
            $messageArray[] = '密码为空！';
            $checkResult = false;
        }
        if($adminCaptcha == null || $adminCaptcha == ''){
            $messageArray[] = '验证码为空！';
            $checkResult = false;
        }
        return $checkResult;
    }
    
    /**
     * @doc 生成验证码
     * @author Heanes
     * @time 2016-10-30 23:28:59 周日
     */
    public function getCaptchaOp(){
        $config =    array(
            'fontSize' => 38,    // 验证码字体大小
            'length'   => 4,     // 验证码位数
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    
}

