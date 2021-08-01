import Vue from 'vue'
import Router from 'vue-router'

import Top from '../views/managements/top.vue';
import Listing from '../views/managements/listing.vue';
import contactList from '../views/managements/contact_list.vue';
import researchDetailList from '../views/managements/research_detail_list.vue';
import accountOutsourcingList from '../views/managements/account_outsourcing_list.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/top',
      name: 'top',
      component: Top
    },
    {
      path: '/listing',
      name: 'listing',
      component: Listing
    },
    {
      path: '/contact_list',
      name: 'contact_list',
      component: contactList
    },
    {
      path: '/research_detail_list',
      name: 'research_detail_list',
      component: researchDetailList
    },
    {
      path: '/account_outsourcing_list',
      name: 'account_outsourcing_list',
      component: accountOutsourcingList
    }
  ]
});
