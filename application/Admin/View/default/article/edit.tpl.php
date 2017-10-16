<?php
/**
 * @doc 文章编辑页面
 * @author Heanes
 * @time 2017-10-16 10:36:10 周一
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
        <!-- 全局消息显示区域 -->
        <div class="global-message hide" id="globalMessage">
        </div>
    </div>
    <div class="data-edit">
        <div class="data-edit-form">
            <form class="form normal">
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="id">ID：</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="请输入ID" value="<?php echo $output['data']['article']['id']?>" readonly>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="order">排序：</label>
                        <input type="text" name="order" class="form-control" id="order" placeholder="请输入序号">
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group">
                        <label class="control-label" for="articleTitle">标题：</label>
                        <textarea class="form-control textarea-title" name="articleTitle" id="articleTitle"><?php echo $output['data']['article']['title']?></textarea>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="createTime">发布时间：</label>
                        <input type="text" name="createTime" value="<?php echo $output['data']['article']['publishTimeFormative']?>" class="form-control" id="createTime" placeholder="请选择创建时间">
                        <i class="fa fa-calendar control-icon" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="createTime">创建时间：</label>
                        <input type="text" name="createTime" value="<?php echo $output['data']['article']['createTimeFormative']?>" class="form-control" id="createTime" placeholder="请选择创建时间">
                        <i class="fa fa-calendar control-icon" aria-hidden="true"></i>
                    </div>
                    <div class="form-group inline">
                        <label class="control-label" for="updateTime">更新时间：</label>
                        <input type="text" name="updateTime" value="<?php echo $output['data']['article']['updateTimeFormative']?>" class="form-control" id="updateTime" placeholder="请选择更新时间">
                        <i class="fa fa-calendar control-icon" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="articleCategory">选择分类：</label>
                        <select class="form-control" id="articleCategory">
                            <option value="0">请选择分类</option>
                            <option value="1">分类一</option>
                            <option value="2">分类二</option>
                            <option value="3">分类三</option>
                        </select>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label">是否置顶：</label>
                        <input type="radio" class="" name="singleSelect" value="1" id="isTop"><label class="control-label input-show-value-text" for="isTop">是</label>
                        <input type="radio" class="" name="singleSelect" value="0" id="isNotTop"> <label class="control-label input-show-value-text" for="isNotTop">否</label>
                    </div>
                    <div class="form-group inline">
                        <label class="control-label">复选按钮：</label>
                        <input type="checkbox" class="" name="multipleSelect" value="1" id="value1"><label class="control-label input-show-value-text" for="value1">值1</label>
                        <input type="checkbox" class="" name="multipleSelect" value="0" id="value2"><label class="control-label input-show-value-text" for="value2">值2</label>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group">
                        <label class="control-label" for="articleContent">内容：</label>
                        <textarea class="form-control textarea-content" name="articleContent" id="articleContent"><?php echo $output['data']['article']['content']?></textarea>
                        <p class="kindEditor-count">
                            您当前输入了 <span class="word-count1">0</span> 个文字。（字数统计包含HTML代码。）<br />
                            您当前输入了 <span class="word-count2">0</span> 个文字。（字数统计包含纯文本、IMG、EMBED，不包含换行符，IMG和EMBED算一个文字。）
                        </p>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group">
                        <label class="control-label" for="articleContentByUEditor">内容：</label>
                        <textarea class="form-control textarea-content uEditor" name="articleContentByUEditor" id="articleContentByUEditor"></textarea>
                    </div>
                </div>
                <div class="form-handle">
                    <div class="handle-group line-group text-center">
                        <button type="button" class="handle btn">放弃</button>
                        <button type="submit" class="handle btn btn-primary btn-lg">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
