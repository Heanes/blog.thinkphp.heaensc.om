/**
 * @doc 框架脚本
 * @author Heanes
 * @time 2016-11-29 10:16:42 周二
 */
$(function () {
    /**
     * @doc 左侧菜单点击在tab中载入
     * @author Heanes
     * @time 2016-11-29 20:20:57 周二
     */
    var $tabsContainer = $('#tabsContainer');
    $tabsContainer.jqxTabs({
        theme: 'bootstrap',
        height: '100%',
        autoHeight: true,
        showCloseButtons: true,
        reorder: true,
        scrollPosition: 'both' // 标签太多时允许滚动
    });//.jqxTabs('hideCloseButtonAt', 0); //隐藏首页删除按钮

    var $tabsTitleContainer = $('#tabsTitleContainer');
    var tabsLength = $tabsTitleContainer.length;
    var tabsAddCount = 0;
    // tab关闭后处理
    $tabsContainer.on('removed', function (event) {
        tabsAddCount--;
    });
    var selectedTab = 0;
    $tabsContainer.on('selected', function (event){
        selectedTab = event.args.item;
    });
    // 刷新标签
    $('#refreshTab').on('click', function () {
        var tabContent = $tabsContainer.jqxTabs('getContentAt', selectedTab);
        var $tabIframe = $(tabContent).find('iframe').first();
        $tabIframe.attr('src', $tabIframe.attr('src'));
    });
    // 关闭全部标签
    $('#closeAllTabs').on('click', function () {
        if(confirm('你确定关闭全部标签吗？')){
            var tabsCount = tabsAddCount;
            for(tabsCount; tabsCount >= 0; tabsCount--){
                $tabsContainer.jqxTabs('removeAt', tabsCount);
            }
        }
    });

    /**
     * @doc a标签点击后添加新的tab（覆写的简便方法）
     * @param $aNode a标签jQuery对象
     * @returns {boolean}
     */
    function addJqxTabFromANode($aNode){
        var placeIndex = tabsLength + tabsAddCount;
        addJqxTabFromANodeAtIndex($aNode, $tabsContainer, placeIndex);
    }

    /**
     * @doc a标签点击后添加新的tab
     * @param $aNode a标签jQuery对象
     * @param $tabsContainer tab放置的容器
     * @param index 序号
     * @returns {boolean}
     */
    function addJqxTabFromANodeAtIndex($aNode, $tabsContainer, index){
        var tabId = 'tabsIframe' + $aNode.attr('data-nodeId');
        var tabTitleId = 'tabsTitle' + $aNode.attr('data-nodeId');
        // 查找是否已经存在此tab（支持tab头被拖动后的定位）
        var $existTabs = $tabsContainer.find('#' + tabTitleId);
        if($existTabs.length > 0){
            // 存在则定位
            var existIndex = $existTabs.parent().parent().index();
            $tabsContainer.jqxTabs('select', existIndex);
            return false;
        }
        var tabTitle = $aNode.html();
        var $tabTitleWrap = '<div class="tab-title-wrap" id="' + tabTitleId + '">' + tabTitle + '</div>';
        var tabSrc = $aNode.attr('href');
        if(tabSrc == undefined || tabSrc == '' || tabSrc == 'javascript:;' || tabSrc == 'javascript:;' || tabSrc == 'javascript:void(0)'){
            return false;
        }
        // 否则创建
        var tabContent = '<iframe src="' + tabSrc + '" id="' + tabId + '"></iframe>';
        $tabsContainer.jqxTabs('addAt', index, $tabTitleWrap, tabContent);

        tabsAddCount++;
        return true;
    }
    /**
     * @doc 获取菜单数据
     * @author Heanes
     * @time 2016-11-29 16:40:18 周二
     */
    var getMenuData = function(){
        var menuDataJsonUrl="js/menu.json";
        $.getJSON(menuDataJsonUrl, function(data){
            //renderMenu($menuLeftBlock, data);
            var $treeView = $('.left-block').treeView({
                data: data,
                iconCollapse: 'triangle-right', // 合上时的图标
                iconExpand: 'triangle-down',    // 展开时的图标
                enableIndentLeft: false,        // 允许向左缩进
                enableLink: true,               // 开启链接
                enableTopSwitch: true,          // 开启顶部切换标识
                showTopNavIcon: false,          // 顶部导航是否显示图标
                topSwitcherTarget: '.menu-top', // 开启了顶部切换后，根节点展示在此处(填写jQuery选择器支持的字符)
                showSingleNodeIcon: true,       // 无子树节点是否显示图标
                style: {
                    topActive: {
                        bgColor: '#254f7b',     // 顶部切换的激活后背景色 topActive.bgColor
                        color: '#fff'           // 顶部切换的激活后字体色 topActive.color
                    },
                    topHover: {
                        bgColor: '#254f7b',     // 侧边树的鼠标浮上背景色 topHover.bgColor #E7E7E7
                        color: '#fff'           // 侧边树的鼠标浮上字体色 topHover.color
                    },
                    left: {
                        bgColor: '#f2f2f2',     // 侧边树的背景色 left.Bg.Color
                        color: '#353535'        // 侧边树的字体色 left.color
                    },
                    leftSelected: {
                        bgColor: '#666',        // 侧边树的选中后的背景色 leftSelected.bgColor
                        color: '#fff'           // 侧边树的选中后的字体色 leftSelected.color
                    },
                    leftHover: {
                        bgColor: '#666',        // 侧边树的鼠标浮上背景色 leftHover.bgColor
                        color: '#fff'           // 侧边树的鼠标浮上字体色 leftHover.color
                    },
                    leftNodeExpanded: {
                        bgColor: '#eee',        // 侧边树的节点展开时背景色 leftNodeExpanded.bgColor
                        color: '#353535'        // 侧边树的节点展开时字体色 leftNodeExpanded.color
                    }
                },                              // 样式相关

                onNodeClick: function (event, node) {
                    if(node.target && node.target == '_blank'){
                        window.open(node.href);
                        return false;
                    }
                    var $aNode = $('<a></a>').attr('href', node.href).attr('data-nodeId', node.nodeId)
                        .append('<i class="tab-title-icon ' + node.nodeIcon + '"></i>')
                        .append('<span class="tab-title">' + node.text + '</span>');
                    addJqxTabFromANode($aNode);
                    return false;
                }
            });

            //@Todo url带子树路径
            /*var hash =window.location.hash;
            var menuHash = hash.match(/menu=(\d+|,){1,}/g);
            var nodeIdsStr = menuHash[0].replace('menu=', '');
            var nodeIdArr = nodeIdsStr.split(',');
            console.log(nodeIdArr);*/


            return data;
        });
    };
    var menuDataJson = getMenuData();


    var $leftBlock = $('.left-block');
    var $centerBlock = $('.center-block');
    /**
     * @doc 全屏的处理
     * @author Heanes
     * @time 2016-12-16 10:37:27 周五
     */
    $('#fullScreen').on('click', function () {
        var $icon = $(this).find('.fa');
        $icon.toggleClass(function() {
            if ($icon.hasClass('fa-arrows-alt')) {
                $icon.removeClass('fa-arrows-alt');
                return 'fa-compress';
            } else {
                $icon.removeClass('fa-compress');
                return 'fa-arrows-alt';
            }
        });
        $(this).closest('.layout-handle').toggleClass('effected');
        $('.main-top-block').toggleClass('full-screen');
        $leftBlock.toggleClass('full-screen');
        $centerBlock.toggleClass('full-screen');
    });

    /**
     * @doc 左侧菜单缩进
     * @author Heanes
     * @time 2016-12-21 16:39:46 周三
     * @type {*}
     */
    var lapHandleClick = false;
    var $leftWith = $('.left-width');
    var leftWidth = $leftWith.css('width');
    $('#lapLeftMenu').on('click', function () {
        if(lapHandleClick){
            $leftBlock.animate({
                'width': leftWidth
            });
            $centerBlock.animate({
                'padding-left': leftWidth
            });
            lapHandleClick = false;
        }else{
            $leftBlock.animate({
                'width': '0'
            });
            $centerBlock.animate({
                'padding-left': '0'
            });
            lapHandleClick = true;
        }
    });

});