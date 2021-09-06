import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import UserCreate from "../views/UserCreate.vue";


const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/user-create",
    name: "UserCreate",
    component: UserCreate,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
];

const router = createRouter({
  linkExactActiveClass: 'active',
  history: createWebHistory(),
  routes,
});

export default router;