<?php
/**
 * @doc 服务器相关方法
 * @author Heanes
 * @time 2017-09-18 19:19:46 周一
 */

namespace Common\utils;

class Server {

    /**
     * @doc 获取当前页面URL
     * @return string URL地址
     * @author Heanes
     * @time 2015-06-24 12:49:00
     */
    public static function getCurrentUrl(){
        if (isset($_SERVER['HTTP_HOST'])) {
            $currentUrl = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $currentUrl .= '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        } else {
            $currentUrl = 'http://localhost/';
        }
        return $currentUrl;
    }

}