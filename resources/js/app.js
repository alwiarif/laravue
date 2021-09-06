import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index'
import boostrap from './bootstrap'

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
// import Pagination from 'v-pagination-3';

const app = createApp(App).use(router,boostrap).mount('#app')

