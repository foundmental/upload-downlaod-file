import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/Home.vue'

Vue.use(Router)

var router = new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            props: true
        },
       
    ]
})

export default router
