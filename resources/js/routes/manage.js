import { createRouter, createWebHistory } from "vue-router";
import Manage_Dashboard from "../manage/pages/dashboard/Manage_Dashboard.vue";
import Manage_Auth from "../manage/pages/auth/Manage_Auth.vue";
import store from "../store"

const routes = [

    {
        path : "/management/login",
        name : "login",
        component : Manage_Auth,
        meta : { title : "Management Login"}
    },
    {
        path : "/management/dashboard",
        name : "dashboard",
        component : Manage_Dashboard,
        meta : { title : "Management Dashboard"}
    },


]


const router = createRouter({
    history: createWebHistory(),
    routes : routes

})

router.beforeEach((to, from, next) => {
    // trying to access a restricted page + not logged in
    // redirect to login page


    if (to.path !== '/management/login' && !store.getters.AuthManageCheck) {
        next('/management/login');
    }else if (to.path === '/management/login' && store.getters.AuthManageCheck){
        next('/management/dashboard');
    }
    else {
        next();
    }

});

export default router
