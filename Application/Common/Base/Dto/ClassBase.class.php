<?php
/**
 * @doc
 * @author Heanes
 * @time
 */

namespace Common\Base\Dto;

/**
 * @doc Trait ClassBase, 类基础方法
 * @package Common\Base\Dto
 * @author Heanes
 * @time 2019-04-13 15:10:38 周六
 */
trait ClassBase {

    /**
     * @doc 对象json输出
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     * @author Heanes
     * @time 2019-04-06 13:48:47 周六
     */
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }

    /**
     * @doc toString
     * @return false|string
     * @author Heanes
     * @time 2019-04-13 15:05:24 周六
     */
    public function toString() {
        return json_encode($this);
    }
}