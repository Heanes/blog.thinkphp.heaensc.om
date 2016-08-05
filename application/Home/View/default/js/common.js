/**
 * @doc 公共js
 * @author fanggang
 * @time 2016-02-22 20:23:35 周一
 */

// rely on jQuery2.x
$(function () {

    var $body = $('body');
    var parentDocument = window.parent.document;
    /**
     * @doc 回顶部
     * @author Heanes
     * @time 2016-02-04 15:36:18 周四
     */
    $('.handle.go-to-top').on('click', function () {
        $body.animate({scrollTop: 0}, 'slow');
    });
    /**
     * @doc 回底部
     * @author Heanes
     * @time 2016-02-04 15:36:18 周四
     */
    $('.handle.go-to-bottom').on('click', function () {
        $body.animate({scrollTop: $body.height()}, 'slow');
    });

    /**
     * @doc 顶部更换字体功能
     * @author fanggang
     * @time 2016-06-09 12:30:05
     */
    // 读取cookie里的字体设置
    $('#textSongti').on('click', function () {
        $body.css({'font-family':'sans-serif'});
        // iframe也设置字体
        $('body', window.parent.document).css({'font-family':'sans-serif'});
        $('iframe', window.parent.document).contents().find('body').css({'font-family':'sans-serif'});
        if($.cookie != null){
            // 操作cookie,存入配置
            $.cookie('font-family', 'sans-serif', {expires: 365});
        }
    });
    $('#textYahei').on('click', function () {
        $body.css({'font-family':'Microsoft Yahei'});
        // iframe也设置字体
        $('body', window.parent.document).css({'font-family':'Microsoft Yahei'});
        $('iframe', window.parent.document).contents().find('body').css({'font-family':'Microsoft Yahei'});
        if($.cookie != null){
            // 操作cookie
            $.cookie('font-family', 'Microsoft Yahei', {expires: 365});
        }
    });

    if($.cookie != null && $.cookie('font-family') != null && $.cookie('font-family') != 'sans-serif'){
        var cookieFontFamily = $.cookie('font-family');
        $body.css({'font-family':cookieFontFamily});
        // iframe也设置字体
        $('body', window.parent.document).css({'font-family':cookieFontFamily});
        $('iframe', window.parent.document).contents().find('body').css({'font-family':cookieFontFamily});
    }

    rollTitle2();
    /**
     * @doc 网页标题滚动显示
     * @param speed 滚动速度
     * @param titleMinLength 标题滚动满足的最小长度
     * @author Heanes
     * @time 2016-08-05 16:32:03
     */
    function rollTitle(speed, titleMinLength){
        var pageTitle = $('title');
        var pageTitleText = pageTitle.text();
        if(pageTitleText.length < (titleMinLength || 18)) return;
        var temp = swapFirstAndLast(pageTitleText);
        pageTitle.text(temp);
        function swapFirstAndLast(string) {
            return string.substring(1, string.length) + string[0];
        }
        setTimeout(rollTitle, speed || 200);
    }

    var pageTitleTextOrigin = $('title').text();
    function rollTitle2(speed, titleMinLength){
        var pageTitle = $('title');
        var pageTitleText = pageTitle.text();
        pageTitleTextOrigin = pageTitleTextOrigin || pageTitleText;
        if(pageTitleTextOrigin.length < (titleMinLength || 18)) return;
        if(pageTitleText.length == 1) pageTitle.text('');
        if(pageTitleText.length == 0) pageTitle.text(pageTitleTextOrigin);
        pageTitle.text(pageTitleText.substring(1, pageTitleText.length));
        setTimeout(rollTitle2, speed|| 200);
    }
});


/**
 * @doc 原生js使iframe自适应宽度高度
 * @use 用法,例如<iframe onLoad="frameAutoHeight('FM_header','FM_header')" src="../layout/header.html" name="FM_header" id="FM_header"></iframe>
 * @param frameName 框架名称
 * @param frameId 框架id
 * @author fanggang
 * @time 2016-02-22 20:24:11 周一
 */
function frameAutoHeight(frameName, frameId){
    var frame = document.getElementById(frameId);
    var subWeb = document.frames ? document.frames[frameName].document : frame.contentDocument;
    if(frame != null && subWeb != null){
        frame.style.height = subWeb.documentElement.scrollHeight + "px";
        //如需自适应宽高，去除下行的“//”注释即可
        frame.style.width = subWeb.documentElement.scrollWidth + "px";
    }
}

/**
 * @doc 使iframe自适应宽度高度
 * @author fanggang
 * @time 2016-04-22 20:04:10
 */
$(function () {
    $('iframe').on('load', function () {
        var thisHeight = $(this).contents().height();
        $(this).css('height', thisHeight);
        var thisWidth = $(this).contents().width();
        $(this).css('width', thisWidth);
    });

});