<?php
/**
 * @doc 文章相关的方法
 * @author Heanes
 * @time 2017-09-20 15:40:06 周三
 */

namespace Index\Controller\Article;

use Common\Service\ArticleCategoryService;
use Common\Service\ArticleService;
use Common\Service\ArticleTagLibService;
use Common\Service\ArticleTagService;
use Think\Page;

trait ArticleWebService {

    /**
     * @doc 查询文章列表信息
     * @param array $articleParam 查询参数
     * @return array
     * @author Heanes
     * @time 2017-10-19 17:26:48 周四
     */
    public function getArticleList($articleParam = []) {
        // 默认参数
        if($articleParam == []){
            $articleParam['where'] = $this->getCommonShowDataSelectParam();
            // 0.1. 分页参数
            $articleParam['page'] = $this->getPageParamArray();
            $articleParam['order'] = 'publish_time desc, id desc';
        }

        // 1. 查询数据
        $articleService = new ArticleService();
        $articlePageList = $articleService->getList($articleParam);
        // 2. 处理文章其他数据
        if($articlePageList['items']){
            $articleIdList = array_unique(array_column($articlePageList['items'], 'id'));
            $articleCatIdList = array_unique(array_column($articlePageList['items'], 'categoryId'));

            // 2.1. 获取文章标签数据
            $articleTagGBArticleId = $this->getArticleTagMapListByArticleIdList($articleIdList);
            // 2.2. 获取文章分类数据
            $articleCategoryGBArticleId = $this->getArticleCategoryMapListByArticleCategoryIdList($articleCatIdList);

            // 2. 获取文章作者信息
            $articleAuthorList = [];
            $articleAuthor = [
                'id' => 1,
                'name' => 'Heanes',
                'url' => U('articleAuthor/' . 1),
            ];

            // 3. 装入其他数据
            foreach ($articlePageList['items'] as $index => &$item) {
                $item['articleTagList'] = $articleTagGBArticleId[$item['id']];
                $item['articleCategory'] = $articleCategoryGBArticleId[$item['categoryId']];
                $item['author'] = $articleAuthor;
            }
        }

        // 文章分页显示
        $articlePageList['articlePager'] = $articlePager = new Page($articlePageList['page']['totalItem'], $articleParam['page']['pageSize']);
        $articlePageList['articlePageShow'] = $articlePageShow = $articlePager->show();

        return $articlePageList;
    }


    /**
     * @doc 根据文章id列表获取文章的标签数据(map)
     * @param $articleIdList
     * @return array
     * @author Heanes
     * @time 2017-09-20 09:56:11 周三
     */
    public function getArticleTagMapListByArticleIdList($articleIdList) {
        // 2.1. 获取文章标签数据
        $articleTagParam['where']['article_id'] = ['in', $articleIdList];
        $articleTagService = new ArticleTagService();
        $articleTagSR = $articleTagService->getList($articleTagParam);
        $articleTagGBArticleId = [];
        if($articleTagSR){
            $articleTagIdList = array_column($articleTagSR, 'tagId');
            $articleTagLibParam['where']['id'] = ['in', $articleTagIdList];
            $articleTagLibService = new ArticleTagLibService();
            $articleTagLibSR = $articleTagLibService->getList($articleTagLibParam);
            if($articleTagLibSR){
                $articleTagLibDataIBId = arrayToKeyIndex($articleTagLibSR, 'id');
                foreach ($articleTagSR as $index => $item) {
                    $tag = $articleTagLibDataIBId[$item['tagId']];
                    $articleTagGBArticleId[$item['articleId']][] = ['id' => $tag['id'], 'name' => $tag['name'], 'url' => U('articleTag/' . urlencode($tag['name']))];
                }
            }
        }
        return $articleTagGBArticleId;
    }

    /**
     * @doc 根据文章id列表获取文章的分类数据，只获取一层(map)
     * @param array $articleCategoryIdList 文章分类ID集合
     * @return array
     * @author Heanes
     * @time 2017-10-19 18:30:13 周四
     */
    public function getArticleCategoryMapListByArticleCategoryIdList($articleCategoryIdList) {
        // 2.1. 获取文章标签数据
        $articleCategoryParam['where']['id'] = ['in', $articleCategoryIdList];
        $articleCategoryService = new ArticleCategoryService();
        $articleCategorySR = $articleCategoryService->getList($articleCategoryParam);
        $articleCategoryGBId = [];
        foreach ($articleCategorySR as $index => $item) {
            $articleCategoryGBId[$item['id']] = ['id' => $item['id'], 'name' => $item['name'], 'url' => U('articleCategory/' . urlencode($item['name']))];
        }
        return $articleCategoryGBId;
    }

}