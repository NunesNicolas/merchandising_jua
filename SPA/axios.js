import axios from "axios";
axios.defaults.withCredentials = true;

const domain = import.meta.env.VITE_API_DOMAIN ?? 'http://localhost:8000';
console.log('env3',import.meta.env)

axios.defaults.baseURL = domain + '/api';
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Accept'] = 'application/json';


axios.interceptors.request.use(
    config => {
        const token = localStorage.getItem('token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    error => {
        return Promise.reject(error);
    }
);
