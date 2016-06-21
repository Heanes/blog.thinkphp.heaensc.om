<?php
/**
 * @doc API公共部分控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:51:27 周二
 */
namespace Api\Controller;
use Think\Controller;
class BaseAPIController extends Controller{

    /**
     * @var string 公共排除字段
     */
    protected $commonExceptFields = 'is_enable,is_deleted,access_password,insert_time,update_time,create_user,update_user';

    function __construct() {
        parent::__construct();
        require_once(APP_PATH.'Common/utils/function/utils.php');
    }
}