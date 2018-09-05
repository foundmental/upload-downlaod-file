import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/Home.vue'
import Test from '../pages/AdminUploadFile.vue'

Vue.use(Router)

var router = new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            props: true,
        },
        {
            path: '/Test',
            name: 'Test',
            component: Test,
            props: true,
        }, 
    ]
})

export default router
