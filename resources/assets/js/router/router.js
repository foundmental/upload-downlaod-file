import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/Home.vue'
import Test from '../pages/AdminUploadFile.vue'
import TestPlugin from '../pages/TestPlugin.vue'
import CheckUploadHistory from '../pages/CheckUploadHistory.vue'
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
        {
            path: '/TestPlugin',
            name: 'test-plugin',
            component: TestPlugin,
            props: true,
        }, 
        {
            path: '/admin/checkUploadHistory',
            name: 'check-upload-history',
            component: CheckUploadHistory,
            props: true,
        },
    ]
})

export default router
