<?php
/**
 * @doc 文章相关控制器
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 14:44:18 周二
 */
namespace Home\Controller;
use Common\Model\ArticleModel;
use Common\Model\ArticleCategoryModel;
class ArticleCategoryController extends BaseHomeController {

    /**
     * @var ArticleCategoryModel 文章分类模型
     */
    private $articleCategoryModel;

    /**
     * @var ArticleModel 文章模型
     */
    private $articleModel;

    /**
     * @doc 默认页面
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:16:12 周二
     */
    public function indexOp(){
        $this->listOp();
    }

    /**
     * @doc 显示文章分类列表
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:45:47 周二
     */
    public function listOp() {
        $output = $this->commonOutput;
        $articleCategoryParam = [
            'where' => [
                [
                    'field' => 'code',
                    'value' => I('get.code', '', 'string'),
                    'operator' => '=',
                ]
            ]
        ];
        $articleCategory = $this->detail_($articleCategoryParam);
        var_dump($articleCategory);

        // 显示文章列表信息
        $articleController = new ArticleController;// 可用简写方法A('Article');但是太low
        $articleParam = [
            'where' => [
                [
                    'field' => 'category_id',
                    'value' => $articleCategory['id'],
                    'operator' => '=',
                ]
            ]
        ];
        $articleList = $articleController->page_($articleParam);
        $output['data']['article'] = $articleList;

        $output['common']['title'] = $articleCategory['name'].' - 分类文章列表';
        $this->assign('output', $output);
        $this->display('list');
    }

    /**
     * @doc 显示文章分类详情
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:46:05 周二
     */
    public function detailOp() {
        // 显示公共信息相关
        $output = $this->commonOutput;
        // 文章数据
        $articleController = new ArticleController;// 可用简写方法A('Article');但是太low
        $articleDetail = $articleController->detail_([]);
        $output['data']['article'] = $articleDetail;

        $output['common']['title'] = $articleDetail['title']. ' - 文章详情';
        $this->assign('output', $output);
        $this->display('detail');
    }

    /**
     * @doc 显示文章分类详情
     * @author Heanes fang <heanes@163.com>
     * @time 2016-06-21 14:46:05 周二
     */
    public function detail_($param) {
        $where = '';
        if($param['where']){
            foreach ($param['where'] as $index => $item) {
                $where .= $item['field'] . ' ' . $item['operator'] . ' ' . $item['value'];
            }
        }
        $where = $where . ($where ? ' and ' : '');
        $this->articleCategoryModel = new ArticleCategoryModel();
        $articleCategoryRaw = $this->articleCategoryModel
            ->where($where . 'is_enable = 1 and is_deleted = 0')
            ->find();
        echo $this->articleCategoryModel->getLastSql();
        return convertToCamelStyle($articleCategoryRaw);
    }
}