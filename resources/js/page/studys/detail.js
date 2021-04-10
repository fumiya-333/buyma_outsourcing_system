require('../../bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

window.Vue = Vue;
Vue.use(VueRouter);

(function() {
	'use strict';

	var vm = new Vue({
		el: '#main',
		methods: {
			download:async function(filePath){
				try {
					const res = await axios.get('/api/download/' + filePath);

					if(res.status == 200){
						window.location = res.request.responseURL;
					} else {
						console.log(res);
						alert("ダウンロードに失敗しました。");
					}
				} catch(e) {
					console.log(e);
					alert("ダウンロードに失敗しました。");
				}
			}.bind(this)
		}
	});
})();
