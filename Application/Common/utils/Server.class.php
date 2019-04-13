<?php
/**
 * @doc 服务器相关方法
 * @author Heanes
 * @time 2017-09-18 19:19:46 周一
 */

namespace Common\utils;

class Server {

    /**
     * @doc 获取当前根域名，此函数和/core/library/Server类中的get_host()方法功能相同
     * @param boolean $end_symbol 返回域名是否 带末尾的/符号，如http://www.heanes.com是不带末尾"/"的，http://www.heanes.com/是带末尾"/"的；
     * @return string 根域名
     * @author Heanes
     * @time 2015-05-05 11:38:47
     */
    function getHost($end_symbol = true){

        if (isset($_SERVER['HTTP_HOST'])) {
            //检测是否为https安全链接
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $request_scheme = 'https';
            } else {
                $request_scheme = 'http';
            }
            $host = $request_scheme.'://'.$_SERVER['HTTP_HOST'];
        } else {
            $host = 'http://localhost';
        }
        if ($end_symbol) {
            $host .= '/';
        }

        return $host;
    }

    /**
     * @doc 获取当前第一级url，如http://heanes.com/article/show/3则返回http://heanes.com/article/show/
     * @param bool|string $end_symbol 返回域名是否 带末尾的/符号，如http://www.heanes.com是不带末尾"/"的，http://www.heanes.com/是带末尾"/"的；
     * @return string 当前级url结果
     * @author Heanes
     * @time 2015-05-27 14:27:48
     */
    function getBaseUrl($end_symbol = true){
        if (isset($_SERVER['HTTP_HOST'])) {
            $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $base_url .= '://'.$_SERVER['HTTP_HOST'];
            $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        } else {
            $base_url = 'http://localhost/';
        }
        if (!$end_symbol) {
            $base_url = rtrim($base_url, '/');
            //$base_url=substr($base_url,0,strlen($base_url)-1);
        }

        return $base_url;
    }

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


    /**
     * @doc 获取url相关信息
     * @return array
     * @author Heanes
     * @time 2017-09-19 16:59:40 周二
     */
    public function getUrlInfo(){
        /**
         * protocol 协议，http or https
         * host 域名
         * path 路径
         * queryParams 请求参数
         */
        return [];
    }

}