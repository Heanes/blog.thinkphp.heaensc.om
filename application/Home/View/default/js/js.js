
$(function () {
    /**
     * @doc 文章模块相关
     * @author fanggang
     * @time 2016-05-21 23:56:54
     */

    /**
     * @doc 文章详情页面滚动时,标题随之钉住在页面顶部显示
     * @author fanggang
     * @time 2016-05-24 01:56:00
     */
    var $mainContent = $('.center .main .main-content');
    var $articleTitleBlock = $('.article-title-block');
    var articleTitleBlockTop = $articleTitleBlock.length > 0 ? $articleTitleBlock.offset().top : null;
    var $articleTitleBlockPlaceholder = $('#articleTitleBlockPlaceholder');
    var articleTitleBlockHeight = $articleTitleBlock.height();

    var $rightFixBlockRightCorner = $('.right-fix-block .right-corner');

    var $rightFixLittleCat = $('#rightFixLittleCat');
    var $footer = $('.footer');
    var footerTop = $footer.length > 0 ? $footer.offset().top : null;
    var $window = $(window);
    $window.on('resize', function () {
        /**
         * @doc 窗口大小改变时改变右侧钉住栏的位置，使其始终贴住'main-content'
         */
        var mainContentWidth = $mainContent.width();
        $rightFixBlockRightCorner.css({
            'margin-left': mainContentWidth / 2
        });
    });


    var $headerNavBar = $('#headerNavBar');
    var $headerNavBarPlaceholder = $('#headerNavBarPlaceholder');
    var headerNavBarTop = $headerNavBar.length > 0 ? $headerNavBar.offset().top : null;
    $window.on('scroll', function () {

        /**
         * @doc 导航栏钉住，变色
         * @author fanggang
         * @time 2016-07-04 15:48:20 周一
         */
        if(headerNavBarTop != null && headerNavBarTop < $window.scrollTop()){
            $headerNavBar.addClass('nav-fix');
            $headerNavBarPlaceholder.show();
        }else{
            $headerNavBar.removeClass('nav-fix');
            $headerNavBarPlaceholder.hide();
        }

        /**
         * @doc 文章详情页面滚动时,标题随之钉住在页面顶部显示
         * @author fanggang
         * @time 2016-05-24 01:56:00
         */
        if(articleTitleBlockTop != null && articleTitleBlockTop < $window.scrollTop()){
            // 填充高度
            $articleTitleBlockPlaceholder.css('height', articleTitleBlockHeight);
            $articleTitleBlock.addClass('fixed');
        }else{
            $articleTitleBlockPlaceholder.css('height', '');
            $articleTitleBlock.removeClass('fixed');
        }

        /**
         * @doc 侧面"小猫咪"到底部后自动隐藏
         * @author fanggang
         * @time 2016-05-30 22:24:10
         */
        if(footerTop != null && $window.scrollTop() > footerTop ){
            $rightFixLittleCat.css('visibility', 'hidden');
        }else{
            $rightFixLittleCat.css('visibility', '');
        }
        // console.log($window.scrollTop());
        // console.log(articleTitleBlockTop);
        // console.log(footerTop);
    });

    /**
     * @doc 文章主体文字字体增大减小
     * @author fanggang
     * @time 2016-05-25 14:27:37
     */
    var $articleContent = $('#articleContent');
    if($.cookie != null && $.cookie('article-content-font-size') != null){
        var cookieArticleContentFontSize = $.cookie('article-content-font-size');
        $articleContent.css({'font-size': cookieArticleContentFontSize});
    }
    var fontChangeStep = 10;
    $('#opToLargeTextBtn').on('click', function () {
        var $articleContentAll = $articleContent.find('*');
        if(fontChangeStep <= 20){
            $articleContentAll.each( function (i, item) {
                $(item).css('font-size', parseInt($(item).css('font-size')) + 1);
            });
            fontChangeStep++;
        }
        // 保存字体大小到cookie中
        if($.cookie != null){
            // 操作cookie
            $.cookie('article-content-font-size', $(item).css('font-size'), {expires: 365});
        }
    });
    $('#opToSmallTextBtn').on('click', function () {
        var $articleContentAll = $articleContent.find('*');
        if(fontChangeStep >= 0){
            $articleContentAll.each( function (i, item) {
                $(item).css('font-size', parseInt($(item).css('font-size')) - 1);
            });
            fontChangeStep--;
        }
        // 保存字体大小到cookie中
        if($.cookie != null){
            // 操作cookie
            $.cookie('article-content-font-size', $(item).css('font-size'), {expires: 365});
        }
    });

    /**
     * @doc 到评论位置（因为页面头部有钉住栏，故不能直接用锚链接跳转形式）
     * @author fanggang
     * @time 2016-05-31 14:26:18 周二
     */
    var $goToArticleCommentBtn = $('#goToArticleCommentBtn');
    // 顶部钉住区域高度偏移量
    var topOffsetHeight = 100;
    $goToArticleCommentBtn.on('click', function () {
        $window.scrollTop($('#comment').offset().top - topOffsetHeight);
        return false;
    });
});