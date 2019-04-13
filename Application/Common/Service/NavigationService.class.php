<?php
/**
 * @doc 导航服务
 * @author Heanes
 * @time 2017-09-12 16:58:21 周二
 */

namespace Common\Service;

use Common\Base\Dto\Ret\ServiceResult;
use Common\Model\NavigationModel;

class NavigationService extends BaseService {

    /**
     * @var NavigationModel
     */
    private $navigationModel;

    function __construct() {
        parent::__construct();
        $this->navigationModel = new NavigationModel();
    }

    /**
     * @doc 获取列表
     * @param array $param 查询参数
     * @param string $resultStyle 查询风格
     * @return ServiceResult
     * @author Heanes
     * @time 2017-09-12 17:09:27 周二
     */
    public function getList($param = [], $resultStyle = RESULT_STYLE_CAMEL) {
        $navigationListRaw = $this->navigationModel->getList($param);

        $result = toStyleResult($navigationListRaw, $resultStyle);
        $return = new ServiceResult(dataOrNullObject($result));
        return $return;
    }

    /**
     * @doc 获取列表
     * @param array $param 查询参数
     * @param string $resultStyle 查询风格
     * @return ServiceResult
     * @author Heanes
     * @time 2019-04-07 13:11:32 周日
     */
    public function getListForWeb($param = [], $resultStyle = RESULT_STYLE_CAMEL) {
        $navigationListRaw = $this->navigationModel->getList($param);

        $result = toStyleResult($navigationListRaw, $resultStyle);
        foreach ($result as $index => &$item) {
            $item['link'] = $item['aHref'];
        }
        $return = new ServiceResult(dataOrNullObject($result));
        return $return;
    }

}