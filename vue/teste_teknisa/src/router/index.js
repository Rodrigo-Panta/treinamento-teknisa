import Vue from 'vue'
import Router from 'vue-router'
import HeaderComponent from '@/components/HeaderComponent'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/header',
      name: 'HeaderComponent',
      component: HeaderComponent
    }
  ]
})
