<?php
/**
 * @doc 定义接口返回字段
 * @author Heanes
 * @time 2019-03-09 18:15:59 周六
 */

namespace Common\Base\Dto\Ret;
use Common\Base\Dto\ClassBase;
use JsonSerializable;

require_once(APP_PATH . 'Common/utils/func/utils.php');
require_once(APP_PATH.'Common/utils/func/date.utils.php');

class ServiceResult implements JsonSerializable{

    use ClassBase;

    /**
     * @var mixed 数据
     */
    private $data;

    /**
     * @var string 消息
     */
    private $msg;

    /**
     * @var int 状态码
     */
    private $code;

    /**
     * @var string|null 响应时间
     */
    private $responseTime;

    /**
     * ServiceResult constructor.
     *
     * @param $data mixed 数据
     * @param $code int 状态码
     * @param $msg string 返回消息
     * @param $responseTime string 响应时间
     * @author Heanes
     * @time 2019-04-06 11:31:20 周六
     */
    public function __construct($data, string $msg = '', int $code = 0, ?string $responseTime = null) {
        $this->data = $data;
        $this->code = $code != null ? $code : 0;
        $this->msg = $msg != null ? $msg: 'ok';
        $this->responseTime = $responseTime == null ? $this->getThisResponseTime($responseTime) : $responseTime;
        return $this;
    }

    /**
     * @doc 返回成功结果
     * @param $data mixed 数据
     * @param $msg string 返回消息
     * @param $responseTime string 响应时间
     * @return ServiceResult
     * @author Heanes
     * @time 2019-04-06 11:28:44 周六
     */
    public static function success($data = null, $msg = 'ok', $responseTime = null) {
        return new ServiceResult($data, 0, $msg, $responseTime);
    }

    /**
     * @doc 返回成功结果
     *
     * @param int $code 状态码
     * @param $msg string 返回消息
     * @param $data mixed 数据
     * @param $responseTime string 响应时间
     * @return ServiceResult
     * @author Heanes
     * @time 2019-04-06 11:28:44 周六
     */
    public static function error($code = -1, $msg = 'error', $data = null, $responseTime = null) {
        return new ServiceResult($data, $code, $msg, $responseTime);
    }

    private function getThisResponseTime($responseTime) {
        return $responseTime != null ? $responseTime : getFormateDate();
    }

    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return ServiceResult
     */
    public function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getMsg(): string {
        return $this->msg;
    }

    /**
     * @param string $msg
     *
     * @return ServiceResult
     */
    public function setMsg(string $msg): ServiceResult {
        $this->msg = $msg;

        return $this;
    }

    /**
     * @return int
     */
    public function getCode(): int {
        return $this->code;
    }

    /**
     * @param int $code
     *
     * @return ServiceResult
     */
    public function setCode(int $code): ServiceResult {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResponseTime(): ?string {
        return $this->responseTime;
    }

    /**
     * @param string|null $responseTime
     *
     * @return ServiceResult
     */
    public function setResponseTime(?string $responseTime): ServiceResult {
        $this->responseTime = $responseTime;

        return $this;
    }

}