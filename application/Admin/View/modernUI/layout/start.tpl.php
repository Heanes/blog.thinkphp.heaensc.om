<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
<meta name="renderer" content="webkit"><!-- 让360等多核模式浏览器默认用极速模式打开 -->
<meta name="author" content="Heanes heanes.com email(heanes@163.com)">
<meta name="keywords" content="软件,商务,HTML,tutorials,source codes">
<meta name="description" content="描述">
<link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
<link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="/public/static/libs/css/reset/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/libs/css/base/base.css"/>
<link rel="stylesheet" type="text/css" href="/public/static/libs/fonts/font-awesome/4.6.3/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/style/style-2016.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/common.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TPL;?>/css/css.css"/>
<title>后台欢迎页面</title>
</head>
<body class="start">
<div class="center wrap">
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 顶部全宽度内容区域 -->
        <div class="main-top-block"></div>
        <!-- 顶部内容 -->
        <div class="main-top-content main-wrap"></div>
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 中心区域 -->
            <div class="center-block center-wrap">
                <!-- 网站部分统计信息展示区域 -->
                <div class="report-count-block">
                    <div class="report-count-one">
                        <div class="report-icon-field article">
                            <i class="fa fa-file-text-o report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">文章总数：</span></th>
                                    <td><strong class="value">2859</strong><span class="unit">篇</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">65</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">17</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field comment">
                            <i class="fa fa-comments report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">评论总数：</span></th>
                                    <td><strong class="value">5681</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">49</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">26</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field member">
                            <i class="fa fa-user report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">用户总数：</span></th>
                                    <td><strong class="value">893</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">28</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">待审核：</span></th>
                                    <td><strong class="value">9</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="report-count-one">
                        <div class="report-icon-field visitor">
                            <i class="fa fa-universal-access report-icon" aria-hidden="true"></i>
                        </div>
                        <div class="report-content">
                            <table class="report main">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">访客总数：</span></th>
                                    <td><strong class="value">8791</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="report">
                                <tbody>
                                <tr>
                                    <th class="title"><span class="title">今日新增：</span></th>
                                    <td><strong class="value">490</strong><span class="unit">个</span></td>
                                </tr>
                                <tr>
                                    <th class="title"><span class="title">独立IP：</span></th>
                                    <td><strong class="value">1089</strong><span class="unit">个</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- 网站报表展示信息 -->
                <div class="report-chart-block">
                    <div class="box report-chart count-number">
                        <div class="title-bock"></div>
                        <div class="content-block">
                            <!-- 文章,评论,用户等统计信息图表展示 -->
                            <div class="count-report count-number" id="countNumber"></div>
                        </div>
                    </div>
                    
                    <div class="box report-chart count-visitor">
                        <div class="title-bock"></div>
                        <div class="content-block">
                            <!-- 网站访客地区统计图表展示 -->
                            <div class="count-report count-visitor" id="countVisitor"></div>
                            <!-- 网站访客使用浏览器统计图表展示 -->
                            <div class="count-report count-browser" id="countVisitorBrowser"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 底部区域 -->
        <div class="main-bottom-content main-wrap"></div>
        <!-- 底部全宽度内容区域 -->
        <div class="main-bottom-block"></div>
    </div>
    <!-- E 主要内容 E -->
</div>
<!-- S 右侧功能区 S -->
<div class="right-bar">
    <div class="right-bar-content"></div>
</div>
<!-- E 右侧功能区 E -->
<cite>
    <!-- S js S -->
    <script type="text/javascript" src="/public/static/libs/js/jquery/2.1.4/jquery-2.1.4.min.js"></script>
    <script src="/public/static/libs/js/chart/ECharts/3.2.3/echarts.js"></script>
    <script src="/public/static/libs/js/chart/ECharts/3.2.3/theme/macarons.js"></script>
    <script src="/public/static/libs/js/chart/ECharts/3.2.3/map/js/china.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/common/common.js"></script>
    <script type="text/javascript">
        $(function () {
            // 基于准备好的dom，初始化echarts实例
            var EChartArticle = echarts.init(document.getElementById('countNumber'), 'macarons');
            // 指定图表的配置项和数据
            var chartArticleOption = {
                title: {
                    text: '文章相关统计'
                },
                tooltip: {},
                legend: {
                    data:['文章总数','用户数','评论数']
                },
                xAxis: {
                    data: ["2016-08-20","2016-08-21","2016-08-22","2016-08-23","2016-08-24","2016-08-25","2016-08-26"]
                },
                yAxis: {},
                series: [
                    {
                        name: '文章总数',
                        type: 'line',
                        smooth: true,
                        data: [21, 29, 12, 35, 17, 26, 11]
                    },
                    {
                        name: '用户数',
                        type: 'line',
                        smooth: true,
                        data: [14, 16, 11, 9, 21, 16, 22]
                    },
                    {
                        name: '评论数',
                        type: 'line',
                        smooth: true,
                        data: [65, 38, 49, 51, 36, 43, 58]
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            EChartArticle.setOption(chartArticleOption);
    
    
            var EChartVisitor = echarts.init(document.getElementById('countVisitor'));
            function randomData() {
                return Math.round(Math.random()*1000);
            }
    
            var chartVisitorOption = {
                title: {
                    text: '访客数统计',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data:['访客数统计']
                },
                visualMap: {
                    min: 0,
                    max: 2500,
                    left: 'left',
                    top: 'bottom',
                    text: ['高','低'],           // 文本，默认为数值文本
                    calculable: true
                },
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    left: 'right',
                    top: 'center',
                    feature: {
                        dataView: {readOnly: false},
                        restore: {},
                        saveAsImage: {}
                    }
                },
                series: [
                    {
                        name: '访客数统计',
                        type: 'map',
                        mapType: 'china',
                        roam: false,
                        label: {
                            normal: {
                                show: true
                            },
                            emphasis: {
                                show: true
                            }
                        },
                        data:[
                            {name: '北京',value: randomData() },
                            {name: '天津',value: randomData() },
                            {name: '上海',value: randomData() },
                            {name: '重庆',value: randomData() },
                            {name: '河北',value: randomData() },
                            {name: '河南',value: randomData() },
                            {name: '云南',value: randomData() },
                            {name: '辽宁',value: randomData() },
                            {name: '黑龙江',value: randomData() },
                            {name: '湖南',value: randomData() },
                            {name: '安徽',value: randomData() },
                            {name: '山东',value: randomData() },
                            {name: '新疆',value: randomData() },
                            {name: '江苏',value: randomData() },
                            {name: '浙江',value: randomData() },
                            {name: '江西',value: randomData() },
                            {name: '湖北',value: randomData() },
                            {name: '广西',value: randomData() },
                            {name: '甘肃',value: randomData() },
                            {name: '山西',value: randomData() },
                            {name: '内蒙古',value: randomData() },
                            {name: '陕西',value: randomData() },
                            {name: '吉林',value: randomData() },
                            {name: '福建',value: randomData() },
                            {name: '贵州',value: randomData() },
                            {name: '广东',value: randomData() },
                            {name: '青海',value: randomData() },
                            {name: '西藏',value: randomData() },
                            {name: '四川',value: randomData() },
                            {name: '宁夏',value: randomData() },
                            {name: '海南',value: randomData() },
                            {name: '台湾',value: randomData() },
                            {name: '香港',value: randomData() },
                            {name: '澳门',value: randomData() }
                        ]
                    }
                ]
            };
            EChartVisitor.setOption(chartVisitorOption);
    
            var EChartVisitorBrowser = echarts.init(document.getElementById('countVisitorBrowser'), 'macarons');
            var chartVisitorBrowserOption = {
                title : {
                    text: '访问浏览器统计',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ['Chrome','IE','FireFox','Safari','Opera']
                },
                series : [
                    {
                        name: '访问来源',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[
                            {value:1548, name:'Chrome'},
                            {value:810, name:'IE'},
                            {value:734, name:'FireFox'},
                            {value:635, name:'Safari'},
                            {value:210, name:'Opera'}
                        ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            EChartVisitorBrowser.setOption(chartVisitorBrowserOption);
    
            setTimeout(function (){
                window.onresize = function () {
                    EChartArticle.resize();
                    EChartVisitor.resize();
                    EChartVisitorBrowser.resize();
                }
            },200)
        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>