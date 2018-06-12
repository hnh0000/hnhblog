/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./paste-upload-image');

require('../vendor/prism/prism');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/*
const app = new Vue({
    el: '#app'
});
*/


// 判断是否登录
$userInfo = $('nav .navbar-right .dropdown');
window.is_login = function () {
    return $userInfo.length > 0;
};

/**
 *
 * @param callback 登录成功后的回调函数
 */
window.must_loign = function (callback, param) {
    if (is_login()) {
        callback(param);
    } else {
        swal({
                title: "请先登录",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "登录",
                closeOnConfirm: false
            },
            function () {
                swal.close();
                $('#b-modal-login').modal('show')
            });
    }
}


window.ajax_error = function (response) {
    swal({
            title: "出了点问题.",
            text: response.responseJSON.message,
            type: "error",
            showCancelButton: false,
            confirmButtonText: "确定",
            closeOnConfirm: false,
        },
        function () {
            window.location.reload();
            swal.close();
        });
};