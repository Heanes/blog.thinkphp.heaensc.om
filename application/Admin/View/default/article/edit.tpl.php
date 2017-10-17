<?php
/**
 * @doc 文章编辑页面
 * @author Heanes
 * @time 2017-10-16 10:36:10 周一
 */
defined('InHeanes') or die('Access denied!');
?>
<!-- 富文本编辑器 kindEditor -->
<link rel="stylesheet" type="text/css" href="/public/static/libs/js/editor/kindEditor/4.1.11/themes/default/default.css"/>
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
            <form class="form normal article-form">
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="id">ID：</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="请输入ID" value="<?php echo $output['data']['article']['id']?>" readonly disabled>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="order">排序：</label>
                        <input type="text" name="order" class="form-control" id="order" placeholder="请输入序号" value="<?php echo $output['data']['article']['order']?>">
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="articleTitle">标题：</label>
                        <textarea class="form-control textarea-title" name="articleTitle" id="articleTitle"><?php echo $output['data']['article']['title']?></textarea>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="publishTime">发布时间：</label>
                        <input type="text" name="publishTime" value="<?php echo $output['data']['article']['publishTimeFormative']?>" class="form-control" id="publishTime" placeholder="请选择创建时间">
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
                        <label class="control-label" for="articleCategoryId">选择分类：</label>
                        <select class="form-control" name="articleCategoryId" id="articleCategoryId">
                            <option value="">请选择分类</option>
                            <option value="1">分类一</option>
                            <option value="2">分类二</option>
                            <option value="3">分类三</option>
                        </select>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label">是否新发布：</label>
                        <input type="radio" class="" name="isNew" value="1" id="isNew"><label class="control-label input-show-value-text" for="isNew">是</label>
                        <input type="radio" class="" name="isNew" value="0" id="isNotNew"> <label class="control-label input-show-value-text" for="isNotNew">否</label>
                    </div>
                    <div class="form-group inline">
                        <label class="control-label">是否置顶：</label>
                        <input type="radio" class="" name="isTop" value="1" id="isTop"><label class="control-label input-show-value-text" for="isTop">是</label>
                        <input type="radio" class="" name="isTop" value="0" id="isNotTop"> <label class="control-label input-show-value-text" for="isNotTop">否</label>
                    </div>
                    <div class="form-group inline">
                        <label class="control-label">是否热门：</label>
                        <input type="radio" class="" name="isHot" value="1" id="isHot"><label class="control-label input-show-value-text" for="isHot">是</label>
                        <input type="radio" class="" name="isHot" value="0" id="isNotHot"> <label class="control-label input-show-value-text" for="isNotHot">否</label>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="articleContent">内容：</label>
                        <textarea class="form-control textarea-content" name="articleContent" id="articleContent"><?php echo $output['data']['article']['content']?></textarea>
                        <p class="kindEditor-count">
                            您当前输入了 <span class="word-count1">0</span> 个文字。（字数统计包含HTML代码。）<br />
                            您当前输入了 <span class="word-count2">0</span> 个文字。（字数统计包含纯文本、IMG、EMBED，不包含换行符，IMG和EMBED算一个文字。）
                        </p>
                    </div>
                </div>
                <div class="line-group">
                    <div class="form-group inline">
                        <label class="control-label" for="articleContentByUEditor">内容：</label>
                        <textarea class="form-control textarea-content uEditor" name="articleContentByUEditor" id="articleContentByUEditor"><?php echo $output['data']['article']['content']?></textarea>
                    </div>
                </div>
                <div class="form-handle">
                    <div class="handle-group line-group text-center">
                        <button type="button" class="handle btn">放弃</button>
                        <button type="submit" class="handle btn btn-primary btn-lg" id="articleDataSubmitBtn">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<cite>
    <!-- S js S -->
    <!-- 日期选择器 WdatePicker -->
    <script type="text/javascript" src="/public/static/libs/js/dateTimePicker/my97DatePicker/4.8/WdatePicker.js"></script>
    <!-- 富文本编辑器 kindEditor -->
    <script type="text/javascript" charset="utf-8" src="/public/static/libs/js/editor/kindEditor/4.1.11/kindeditor-all-min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/static/libs/js/editor/kindEditor/4.1.11/lang/zh-CN.js"></script>
    <!-- 富文本编辑器 uEditor -->
    <script type="text/javascript" charset="utf-8" src="/public/static/libs/js/editor/uEditor/1.4.3.3/php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/static/libs/js/editor/uEditor/1.4.3.3/php/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/static/libs/js/editor/uEditor/1.4.3.3/php/lang/zh-cn/zh-cn.js"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="/public/static/libs/js/select2/4.0.3/js/select2.full.js"></script>
    <script type="text/javascript">
        $(function () {
            /* 日期时间选择器 */
            // datetimepicker
            $('#createTime').on('click', function () {
                WdatePicker({
                    // 选择完毕后自动打开后一个选择器
                    doubleCalendar:true,
                    skin: 'bootstrap',
                    firstDayOfWeek: 1
                });
            });
            $('#updateTime').on('click', function () {
                WdatePicker({
                    doubleCalendar:true,
                    skin: 'bootstrap',
                    firstDayOfWeek: 1
                });
            });

            $('.select2').select2({placeholder: "请选择"});

            /**
             * @doc kindEditor富文本编辑器
             * @author Heanes
             * @time 2016-09-27 17:36:37 周二
             */
            // 文章标题部分
            var kindEditorTitleOption = {
                minWidth : '740px',
                width : '740px',
                minHeight: '76px',
                height: '76px',
                items : [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', '|', 'source', '|', 'undo', 'redo',],
                cssData: 'body {font-size:14px}'
            };
            // 文章内容部分
            var kindEditorContentOption = {
                minWidth : '740px',
                width : '740px',
                minHeight: '740px',
                height: '740px',
                cssData: 'body {font-size:14px}',
                afterChange : function() {
                    $('.word-count1').html(this.count());
                    $('.word-count2').html(this.count('text'));
                }
            };
            KindEditor.ready(function(K) {
                K.create('textarea[name="articleTitle"]', kindEditorTitleOption);
                K.create('textarea[name="articleContent"]', kindEditorContentOption);
            });

            /**
             * @doc uEditor富文本编辑器
             * @author Heanes
             * @time 2016-09-28 19:51:25 周三
             */
            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('articleContentByUEditor');


            // ---------------- 数据处理 ----------------
            var $articleForm = $('.article-form');
            var $articleDataSubmitBtn = $('#articleDataSubmitBtn');
            /**
             * @doc 文章数据提交
             * @author Heanes
             * @time 2017-10-17 14:22:24 周二
             */
            $articleDataSubmitBtn.on('click', function () {
                console.log($articleForm.serializeArray());
                return false;
            });
        });
    </script>
    <!-- E js E -->
</cite>
