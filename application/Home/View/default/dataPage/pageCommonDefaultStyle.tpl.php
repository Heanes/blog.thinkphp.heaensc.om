<?php
/**
 * @doc 公共分页样式
 * @author Heanes <heanes@163.com>
 * @time: 2016-11-13 20:47:53 周日
 */
defined('InHeanes') or die('Access denied!');
?>
<div class="data-page-block article-page">
    <div class="page-link">
        <a href="javascript:;" class="turn-page prev-page">上一页</a>
        <?php foreach ($output['pageResult'] as $key => $page){ ?>
        <a href="javascript:;" class="turn-page current">1</a>
        <?php }?>
        <a href="javascript:;" class="turn-page">2</a>
        <a href="javascript:;" class="turn-page">3</a>
        <a href="javascript:;" class="turn-page">4</a>
        <a href="javascript:;" class="turn-page ellipsis">...</a>
        <a href="javascript:;" class="turn-page">16</a>
        <a href="javascript:;" class="turn-page">17</a>
        <a href="javascript:;" class="turn-page next-page">下一页</a>
    </div>
</div>
