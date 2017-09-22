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
    private $adminUserService;
    
    function __construct(){
        parent::__construct();
    }
    
    /**
     * @doc Admin默认方法
     * @author Heanes <heanes@163.com>
     * @time 2016-06-21 14:52:32 周二
     */
    public function indexOp(){
        $output = $this->commonOutput;
    }

}

