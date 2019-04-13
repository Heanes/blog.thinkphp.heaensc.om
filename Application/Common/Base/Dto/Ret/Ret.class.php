<?php
/**
 * @doc 快捷return ServiceResult
 * @author Heanes
 * @time 2019-04-13 17:50:35 周六
 */

namespace Common\Base\Dto\Ret;

use Common\Base\Dto\ClassBase;
use JsonSerializable;

class Ret implements JsonSerializable {
    use ClassBase;

    public static function retTrue($data, $msg) {
        ;
    }

    public static function retFalse($code, $msg) {
        ;
    }
}