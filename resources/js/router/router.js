import {createRouter,
    createWebHistory} from "vue-router";
import SelectMusic from "../sources/SelectMusic/SelectMusic";

const routes = [
    {
        path:"/",
        name:"Select",
        component:SelectMusic,

    },
]

const router = createRouter(
    {
        mode: 'history',
        history:createWebHistory(process.env.BASE_URL),
        routes,
        linkActiveClass: 'active'

    }
)


export default router;