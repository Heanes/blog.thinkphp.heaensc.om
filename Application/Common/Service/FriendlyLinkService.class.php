<?php
/**
 * @doc 友情链接服务
 * @author Heanes
 * @time 2017-09-22 14:20:58 周五
 */

namespace Common\Service;

use Common\Base\Dto\Ret\ServiceResult;
use Common\Model\FriendlyLinkModel;

class FriendlyLinkService extends BaseService {
    /**
     * @var FriendlyLinkModel
     */
    private $friendlyLinkModel;

    function __construct() {
        parent::__construct();
        $this->friendlyLinkModel = new FriendlyLinkModel();
    }

    /**
     * @doc 获取列表
     *
     * @param array $param 查询参数
     * @param string $resultStyle 查询风格
     *
     * @return ServiceResult
     * @author Heanes
     * @time 2017-09-12 17:09:27 周二
     */
    public function getList($param = [], $resultStyle = RESULT_STYLE_CAMEL) {
        $friendlyLinkListRaw = $this->friendlyLinkModel->getList($param);

        $result = toStyleResult($friendlyLinkListRaw, $resultStyle);
        $return = new ServiceResult($result);
        return $return;
    }
}