<?php
/**
 * @doc 导航服务
 * @author Heanes
 * @time 2017-09-12 16:58:21 周二
 */

namespace Common\Service;


use Common\Model\NavigationModel;

class NavigationService extends BaseService {


    private $navigationModel;


    function __construct() {
        parent::__construct();
        $this->navigationModel = new NavigationModel();
    }

    /**
     * @doc 获取列表
     * @param array $param 查询参数
     * @param string $resultStyle 查询风格
     * @return array|null|string
     * @author Heanes
     * @time 2017-09-12 17:09:27 周二
     */
    public function getList($param, $resultStyle = RESULT_STYLE_CAMEL){
        $navigationListRaw = $this->navigationModel->getList($param);

        // 如果是驼峰格式
        if($resultStyle == RESULT_STYLE_CAMEL){
            $navigationListResult = convertToCamelStyle($navigationListRaw);
        }else {
            $navigationListResult = $navigationListRaw;
        }
        return $navigationListResult;
    }

}