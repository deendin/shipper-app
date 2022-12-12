import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';
import './assets/main.css'

const app = createApp(App)
const axiosInstance = axios.create({
    withCredentials: true
})
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axiosInstance.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axiosInstance.defaults.baseURL = import.meta.env.VITE_VUE_APP_SERVER_API_BASE
app.use(router)
app.config.globalProperties.$axios = { ...axiosInstance }
app.mount('#app')

