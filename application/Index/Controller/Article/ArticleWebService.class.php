<?php
/**
 * @doc 文章相关的方法
 * @author Heanes
 * @time 2017-09-20 15:40:06 周三
 */

namespace Index\Controller\Article;

use Common\Service\ArticleTagLibService;
use Common\Service\ArticleTagService;

trait ArticleWebService {



    /**
     * @doc
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

}