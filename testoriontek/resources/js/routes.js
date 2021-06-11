import AllClient from './components/AllClient.vue';
import AddClient from './components/AddClient.vue';
import EditClient from './components/EditClient.vue';
import EditDirection from './components/EditDirection';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllClient
    },
    {
        name: 'add',
        path: '/add',
        component: AddClient
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditClient
    },
    {
        name: 'editdirection',
        path: '/editdirection/:id',
        component: EditDirection
    },
];
