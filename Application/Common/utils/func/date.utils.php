<?php
/**
 * @doc 时间函数
 * @author Heanes
 * @time 2019-04-05 13:15:26 周五
 */

function getFormateDate(){
    $dateTimeStr = '';
    try {
        $dateTime = new \DateTime();
        $dateTimeStr = $dateTime->format('Y-m-d H:i:s');
    } catch (\Exception $e) {
        ;
    }
    return $dateTimeStr;
}