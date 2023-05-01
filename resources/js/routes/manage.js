import { createRouter, createWebHistory } from "vue-router";
import Manage_Dashboard from "../manage/pages/dashboard/Manage_Dashboard.vue";

const routes = [

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


    // if (to.path !== '/auth' && !store.getters.AuthCheck) {
    //     next('/auth');
    // }else if (to.path === '/mama-admins/auth' && store.getters.AuthCheck){
    //     next('/mama-admins/dashboard');
    // }
    // else {
    //     next();
    // }
    next();
});

export default router
