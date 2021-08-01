require('./bootstrap');

import Vue from 'vue';

window.Vue = Vue;

import router from './router'

const app = new Vue({
    el: '#main',
    router
});

// (function() {
// 	'use strict';
//
// 	var vm = new Vue({
// 		el: '#main',
// 		router,
// 		methods: {
// 			download:async function(filePath){
// 				try {
// 					const res = await axios.get('/api/download/' + filePath);
//
// 					if(res.status == 200){
// 						window.location = res.request.responseURL;
// 					} else {
// 						console.log(res);
// 						alert("ダウンロードに失敗しました。");
// 					}
// 				} catch(e) {
// 					console.log(e);
// 					alert("ダウンロードに失敗しました。");
// 				}
// 			}.bind(this)
// 		}
// 	});
// })();
