import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import '../css/app.css';
import {createPinia} from "pinia";
const pinia = createPinia()

const app = createApp(App);
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'Home',
            path: '/',
            component: () => import('./pages/Home.vue')
        },
        {
            name: 'Tasks-list',
            path: '/tasks',
            component: () => import('./pages/TasksList.vue')
        },
        {
            name: 'Task-action',
            path: '/tasks/:action/:id?',
            component: () => import('./pages/Task.vue')
        },
        {
            name: 'Task',
            path: '/tasks/:id',
            component: () => import('./pages/Task.vue')
        },
    ]
});

app.use(router).use(pinia).mount('#app');
