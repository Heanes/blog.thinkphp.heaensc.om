
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
    var articleTitleBlockTop = $articleTitleBlock.offset().top;
    var $articleTitleBlockPlaceholder = $('#articleTitleBlockPlaceholder');
    var articleTitleBlockWidth = $articleTitleBlock.width();
    var articleTitleBlockHeight = $articleTitleBlock.height();

    var $rightFixBlockRightCorner = $('.right-fix-block .right-corner');

    var $rightFixLittleCat = $('#rightFixLittleCat');
    var $iframeFooter = $('.iframe-footer');
    var iframeFooterTop = $iframeFooter.offset().top;
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
    $window.on('scroll', function () {
        /**
         * @doc 文章详情页面滚动时,标题随之钉住在页面顶部显示
         * @author fanggang
         * @time 2016-05-24 01:56:00
         */
        if($window.scrollTop() > articleTitleBlockTop){
            // 填充高度
            $articleTitleBlockPlaceholder.css('height', articleTitleBlockHeight);
            $articleTitleBlock.css({
                'position':'fixed',
                'top':0,
                'z-index':2,
                'width':articleTitleBlockWidth,
                'background-color':'#fff'
            });
        }else{
            $articleTitleBlockPlaceholder.css('height', '');
            $articleTitleBlock.css({
                'position':'',
                'z-index':'',
                'top':'',
                'width':'',
                'background-color':''
            });
        }

        /**
         * @doc 侧面"小猫咪"到底部后自动隐藏
         * @author fanggang
         * @time 2016-05-30 22:24:10
         */
        if($window.scrollTop() > (iframeFooterTop -1000)){
            $rightFixLittleCat.css('visibility', 'hidden');
        }else{
            $rightFixLittleCat.css('visibility', '');
        }
        // console.log($window.scrollTop());
        // console.log(articleTitleBlockTop);
        // console.log(iframeFooterTop);
    });

    /**
     * @doc 文章主体文字字体增大减小
     * @author fanggang
     * @time 2016-05-25 14:27:37
     */
    var $articleMainContent = $('#mainContent');
    var fontChangeStep = 10;
    $('#opToLargeTextBtn').on('click', function () {
        var $articleMainContentAll = $articleMainContent.find('*');
        if(fontChangeStep <= 20){
            $articleMainContentAll.each( function (i, item) {
                $(item).css('font-size', parseInt($(item).css('font-size')) + 1);
            });
            fontChangeStep++;
        }
    });
    $('#opToSmallTextBtn').on('click', function () {
        var $articleMainContentAll = $articleMainContent.find('*');
        if(fontChangeStep >= 0){
            $articleMainContentAll.each( function (i, item) {
                $(item).css('font-size', parseInt($(item).css('font-size')) - 1);
            });
            fontChangeStep--;
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