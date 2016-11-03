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
    
    /**
     * @var AdminUserModel
     */
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
        $output = $this->commonOutput;
    }
    
    /**
     * @doc 登录页面
     * @author Heanes
     * @time 2016-10-30 23:27:28 周日
     */
    public function loginOp() {
        $output = $this->commonOutput;
        $output['title'] = '登陆';
        $this->assign('output', $output);
        $this->display('layout/login');
    }
    
    /**
     * @doc 退出登录
     * @author Heanes
     * @time 2016-10-31 18:34:26 周一
     */
    public function loginOutOp() {
        if($this->doLoginOut()){
            $this->display('login/loginOut');
        }
    }
    
    /**
     * @doc 退出登录
     * @author Heanes
     * @time 2016.11.03日11:09:08 周四
     */
    public function doLoginOut() {
        unset($_SESSION['isLoginAdmin']);
        return true;
    }

    /**
     * @doc 登录提交
     * @author Heanes
     * @time 2016-10-31 16:39:03 周一
     */
    public function doLoginOp() {
        $postAdminName = I('request.adminName', '', 'string');
        $postAdminPassword = I('request.adminPassword', '', 'string');
        $postAdminCaptcha = I('request.adminCaptcha', '', 'string');
        $result = [];
        $needCaptcha = $this->commonOutput['common']['settingCommon']['adminLoginNeedCaptcha'] ?: false;
        if(!($this->checkLoginParam($result, $postAdminName, $postAdminPassword, $postAdminCaptcha, $needCaptcha))){
            returnJson($result);
            return false;
        }
        // 检查验证码
        if($needCaptcha){
            if(!($this->checkAdminCaptcha($postAdminCaptcha))){
                returnJson($result);
                return false;
            }
        }
        
        $this->adminLogin($result, $postAdminName, $postAdminPassword);
        returnJson($result);
        $this->redirect('index/index');
        return true;
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
    private function checkAdminCaptcha($code, $id = '') {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    
    /**
     * @doc 检查登录参数
     * @param $result
     * @param $adminName string 账户名
     * @param $adminPassword string 密码
     * @param $adminCaptcha string 验证码
     * @param $needCaptcha boolean 是否验证验证码
     * @return bool 检查结果
     * @author Heanes
     * @time 2016-10-31 16:50:06 周一
     */
    private function checkLoginParam(&$result, $adminName, $adminPassword, $adminCaptcha, $needCaptcha = true){
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
        if($needCaptcha){
            if($adminCaptcha == null || $adminCaptcha == ''){
                $messageArray[] = '验证码为空！';
                $checkResult = false;
            }
        }
        $result['message'] = implode(',', $messageArray);
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
    
    /**
     * @doc 检查验证码
     * @author Heanes
     * @time 2016年11月02日00:06:17
     */
    private function verifyCaptcha($code, $id = '') {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    
}

