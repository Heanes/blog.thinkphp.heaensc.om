/**
 * @doc vue.js 实现部分请求
 * @author Heanes
 * @time 2016-07-13 17:02:33
 */
Vue.config.debug = true;
var navigationList = new Vue({
    el: '#navigationList',
    data: {
        navigationList: []
    },
    methods: {
        isCurrentPath: function(data) {
            return window.location.pathname == data;
        }
    }
});

// 获取导航列表
var API = {
    'navigationList':'/api/navigation/list'
};
$.ajax({
    url: API.navigationList,
    method: 'POST',
    data: {},
    dataType: "json",
    success: function (result) {
        navigationList.navigationList = result.body || [];
    },
    fail: function (result) {
        alert('数据异常！');
    }
});