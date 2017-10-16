<?php
/**
 * @doc 文章列表页
 * @author Heanes <heanes@163.com>
 * @time: 2016-11-06 18:37:36 周日
 */
defined('InHeanes') or die('Access denied!');
?>
<div class="center-block center-wrap">
    <div class="page-breadcrumb bg-normal box-normal">
        <div class="breadcrumb-wrap">
            <div class="breadcrumb-cell breadcrumb-node breadcrumb-root">
                <span class="breadcrumb-text"><a href="javascript:void(0);">文章</a></span>
            </div>
            <div class="breadcrumb-cell breadcrumb-delimiter">
                <span class="separator">/</span>
            </div>
            <div class="breadcrumb-cell breadcrumb-node">
                <span class="breadcrumb-text"><a href="javascript:void(0);">文章内容</a></span>
            </div>
        </div>
    </div>
    <div class="page-content">
        <!-- 数据查询表单 -->
        <div class="search-form-wrap bg-normal box-normal">
            <form class="search-form form-inline" role="form">
                <!-- 表单输入区域 -->
                <div class="input-block">
                    <div class="line-group">
                        <div class="form-group">
                            <label class="control-label" for="searchOrderId">订单ID：</label>
                            <input type="text" name="searchOrderId" class="form-control" id="searchOrderId" placeholder="请输入订单ID">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="searchShopName">店铺名称：</label>
                            <input type="text" name="searchShopName" class="form-control" id="searchShopName" placeholder="店铺名称">
                        </div>
                    </div>
                    <div class="line-group">
                        <div class="form-group">
                            <label class="control-label" for="searchOrderTimeStart">下单时间：</label>
                            <input type="text" name="searchOrderTimeStart" class="form-control" id="searchOrderTimeStart" placeholder="请输入下单起始时间">
                        </div>
                        <div class="form-group">
                            <label class="control-label text-center" for="searchOrderTimeEnd">/</label>
                            <input type="text" name="searchOrderTimeEnd" class="form-control" id="searchOrderTimeEnd" placeholder="请输入下单截止时间">
                        </div>
                    </div>
                    <div class="line-group">
                        <div class="form-group">
                            <label class="control-label" for="searchShopId">选择店铺：</label>
                            <select name="searchShopId" id="searchShopId" class="form-control select2 normal-input-width">
                                <option value="">请选择</option>
                                <option value="1">店铺1</option>
                                <option value="2">店铺2</option>
                                <option value="3">店铺3</option>
                                <option value="4">店铺4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="searchPayType">付款方式：</label>
                            <select name="searchPayType" id="searchPayType" class="form-control normal-input-width">
                                <option value="">请选择</option>
                                <option value="2">在线支付</option>
                                <option value="3">货到付款</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- 表单操作区域 -->
                <div class="form-handle">
                    <div class="handle-inline">
                        <button type="submit" class="btn btn-primary btn-lg">搜索</button>
                    </div>
                    <div class="handle-inline">
                        <button type="reset" class="btn btn-info btn-sm">重置</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- 全局消息显示区域 -->
        <div class="global-message hide" id="globalMessage">
        </div>
        <!-- 数据相关信息显示区域 -->
        <div class="data-info box-normal hide">
        </div>
        <!-- 数据操作区域 -->
        <div class="date-handle">
            <div class="table-cell handle-left">
                <button class="btn btn-success">添加</button>
            </div>
            <div class="table-cell handle-right">
                <a href="javascript:;" class="handle handle-inline disabled">启用</a>
                <a href="javascript:;" class="handle handle-inline">禁用</a>
            </div>
        </div>
        <!-- 数据列表 -->
        <div class="data-list article-list">
            <!-- 数据列表 -->
            <div class="data-list-table box-normal">
                <table class="table table-bordered table-striped table-hover table-condensed thead-tr-bg-normal" data-toggle="table">
                    <thead>
                    <tr class="bg-normal">
                        <th class="select-row">选择</th>
                        <th>#id</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类目录</th>
                        <th>发表时间</th>
                        <th>创建时间</th>
                        <th>置顶</th>
                        <th>热门</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($output['data']['article']['items'] as $key => $article){?>
                    <tr>
                        <td class="select-row"><input type="checkbox" name="selectRow"></td>
                        <td><?php echo $article['id'];?></td>
                        <td><?php echo $article['title'];?></td>
                        <td><?php echo $article['author'];?></td>
                        <td><?php echo $article['articleCategory']['name'];?></td>
                        <td><?php echo $article['publishTimeFormative'];?></td>
                        <td><?php echo $article['createTimeFormative'];?></td>
                        <td class="text-center">
                            <a href="javascript:">
                                <i class="fa <?php if($article['isTop']){?>fa-check on<?php }else{?>fa-close off<?php }?>" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="javascript:">
                                <i class="fa <?php if($article['isHot']){?>fa-check on<?php }else{?>fa-close off<?php }?>" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a href="edit/<?php echo $article['id']?>.html" class="op-btn btn btn-primary btn-mini"><i class="op-icon fa fa-edit" aria-hidden="true"></i><span class="btn-text">编辑</span></a>
                            <a href="javascript:;" class="op-btn btn btn-info btn-mini"><i class="op-icon fa fa-search-plus" aria-hidden="true"></i><span class="btn-text">查看</span></a>
                            <a href="javascript:;" class="op-btn btn btn-danger btn-mini"><i class="op-icon fa fa-trash" aria-hidden="true"></i><span class="btn-text">删除</span></a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- 选中后的数据的批量操作 -->
            <div class="data-selected-handle">
                <span class="handle-one"><input type="checkbox" id="selectAll" class="inline-block"/><label for="selectAll" class="inline-block">全选</label></span>
                <span class="handle-one"><input type="checkbox" id="selectReserve" class="inline-block"/><label for="selectReserve" class="inline-block">反选</label></span>
                <span class="handle-one"><button class="btn btn-danger btn-small">删除</button></span><span class="handle-desc">当前已选中<strong class="selected-count">8</strong>条数据</span>
            </div>
        </div>
        <!-- 列表脚部区域 -->
        <div class="data-list-footer">
            <!-- 分页 -->
            <div class="data-pager clearfix">
                <div class="pagination-wrap pull-right">
                    <ul class="pagination">
                        <li class="page-item prev-page">
                            <a class="page-link disabled" href="javascript:;">«</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link current" href="javascript:;">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link ellipsis" href="javascript:;">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">9</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">10</a>
                        </li>
                        <li class="page-item next-page">
                            <a class="page-link" href="javascript:;">»</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
