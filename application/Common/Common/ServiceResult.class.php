<?php
/**
 * @doc 接口结果容器定义
 * @author Heanes
 * @time 2017-09-13 15:33:11 周三
 */

namespace Common\Common;


class ServiceResult {

    /**
     * @var boolean 是否成功
     */
    private $success;

    /**
     * @var object 数据，泛型
     */
    private $data;

    /**
     * @var array 错误
     */
    private $error;

    /**
     * @var string 错误代码
     */
    private $errorCode;

    /**
     * @var string 返回消息
     */
    private $msg;

    /**
     * @return bool
     */
    public function isSuccess() {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess($success) {
        $this->success = $success;
    }

    /**
     * @return object
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param object $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getError() {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError($error) {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getErrorCode() {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     */
    public function setErrorCode($errorCode) {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getMsg() {
        return $this->msg;
    }

    /**
     * @param string $msg
     */
    public function setMsg($msg) {
        $this->msg = $msg;
    }

}