<?php
/**
 * @doc 登录页
 * @filesource login.tpl.php
 * @copyright heanes.com
 * @author Heanes
 * @time 2016-10-30 22:46:35 周日
 */
defined('InHeanes') or exit('Access Invalid!');
?>
<!DOCTYPE html>
<html class="admin-login">
<head>
    <!-- meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <!-- responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
    <meta name="renderer" content="webkit"/><!-- 让360等多核模式浏览器默认用极速模式打开 -->
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)"/>
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes"/>
    <meta name="description" content="描述，不超过150个字符"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <!-- css -->
    <include file="layout/css.inset"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/login.css"/>
    <title><?php echo $output['common']['title'].$output['common']['titleCommonSuffix'];?></title>
</head>
<body class="admin-login green-sky background-image">
<div class="wrap">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 中心区域 -->
            <div class="center-block center-wrap right-content">
                <div id="clouds" class="admin-login cloud-stage"></div>
                <div class="admin-login-box-background"></div>
                <div class="admin-login-box login-block">
                    <h1>后台管理系统登录</h1>
                    <form action="doLogin.html" method="post" name="login-form" class="login-form normal-width" id="login-form">
                        <div class="input-row">
                            <div class="input-field">
                                <label for="adminName">管理账号:</label>
                                <div class="input-unit">
                                    <input type="text" name="adminName" id="adminName" class="normal-input" title="请输入管理员账号" placeholder="请输入管理员账号" required="" autofocus />
                                    <i class="reset-input-icon">x</i>
                                </div>
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-field">
                                <label for="adminPassword">密码:</label>
                                <div class="input-unit">
                                    <input type="password" name="adminPassword" id="adminPassword" class="normal-input" title="请输入密码" placeholder="请输入密码" required="" />
                                    <i class="reset-input-icon">x</i>
                                </div>
                            </div>
                        </div>
                        <?php if($output['common']['settingCommon']['needCaptcha']){?>
                        <div class="input-row">
                            <div class="input-field captcha">
                                <label for="adminCaptcha">验证码:</label>
                                <div class="input-unit">
                                    <input type="text" name="adminCaptcha" id="adminCaptcha" class="normal-input" title="请输入验证码" placeholder="请输入验证码" required="" />
                                    <i class="reset-input-icon">x</i>
                                </div>
                                <div class="input-reference">
                                    <img class="admin-captcha" src="getCaptcha.html" id="adminCaptchaImage">
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <div class="login-handle">
                            <div class="login-handle-field">
                                <input type="submit" class="login-submit" name="login-form-submit" value="登录" />
                            </div>
                        </div>
                        <div class="login-handle-extra">
                            <div class="inline inline-half remember-account">
                                <label class="color-dark"><input type="checkbox" name="rememberAccount" class="inline v-middle" value="1"><span class="checkbox-text inline v-middle">记住我</span></label>
                            </div>
                            <div class="inline inline-half forget-password">
                                <a href="javascript:;" class="color-dark">忘记密码？</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- E 主要内容 E -->
    <!-- S 脚部 S -->
    <div class="footer">
    
    </div>
    <!-- E 脚部 E -->
</div>
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.1.4/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/public/static/libs/js/jquery.spritely/0.6.8/jquery.spritely-0.6.8.js"></script><!-- 云层效果 -->
    <script type="text/javascript" src="<?php echo TPL;?>/js/common/common.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/chur.min.js"></script><!-- 蒲公英漂浮效果 -->
    <script type="text/javascript">
        $(function () {
            var tplPath = '<?php echo TPL;?>';
            //蒲公英漂浮效果
            /*new SnowStorm(tplPath + '/image/andelion/');*/
            
            //云层漂浮效果
            /**
             * 登录页的云层运动特效
             */
            $('#clouds111').pan({
                fps: 20,
                speed: 0.7,
                dir: 'right',
                depth: 10
            });
            $('#adminCaptchaImage').on('click', function() {
                var randomInt = Math.floor(Math.random() * 1000+1);
                $(this).attr('src', 'getCaptcha?t=' + randomInt);
            });
            
            /**
             * @doc 输入框的清空按钮
             * @author Heanes
             * @time 2016-10-30 18:44:15 周日
             */
            $('.reset-input-icon').on('click', function() {
                $(this).prev('input').val('').focus();
            });

            /**
             * @doc 登录操作
             * @author Heanes
             * @time 2016-10-31 18:05:14 周一
             */
            $('#adminLoginBtn').on('click', function () {
                var $adminName = $('input[name="adminName"]');
                var $adminPassword = $('input[name="adminPassword"]');
                var $adminCaptcha = $('input[name="adminCaptcha"]');
                var data = {adminName: $adminName.val(), adminPassword: $adminPassword.val(), adminCaptcha: $adminCaptcha.val()};
                $.ajax({
                    url: "doLogin.html",
                    type: "POST",
                    data: data,
                    dataType: "json",
                    success: function (result) {
                        alert('提交成功');
                        console.log(result);
                    },
                    fail: function (result) {
                        alert('出现问题：' + status);
                    }

                });
                return false;
            });
        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>
