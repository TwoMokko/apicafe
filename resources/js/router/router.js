import { createRouter, createWebHistory } from "vue-router";
import HomePage from "@/pages/site/HomePage.vue";
import GamesPage from "@/pages/site/GamesPage.vue";
import AdminGamePage from "@/pages/admin/AdminGamePage.vue";
import GameUpdatePage from "@/pages/admin/GameUpdatePage.vue";
import GameCreatePage from "@/pages/admin/GameCreatePage.vue";
import NotFound from "@/pages/NotFound.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/games',
        name: 'games',
        component: GamesPage
    },
    {
        path: '/admin-games',
        name: 'adminGames',
        component: AdminGamePage,
        props: true
    },
    {
        path: '/game-update/:gameId',
        name: 'gameUpdate',
        component: GameUpdatePage,
        props: true
    },
    {
        path: '/game-create',
        name: 'gameCreate',
        component: GameCreatePage,
        props: true
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notfound',
        component: NotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
