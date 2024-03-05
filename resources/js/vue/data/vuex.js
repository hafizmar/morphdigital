import { createStore } from 'vuex';

const store = createStore({
    // state() {
    //     return {
    //         count: 0,
    //         isLoggedIn: false,
    //     }
    // },
    state: {
        token: localStorage.getItem('token') || null,
    },
    // mutations: {
    //     increment(state) {
    //         state.count++
    //     },
    //     loggedIn(state) {
    //         state.isLoggedIn = true;
    //     },
    //     logout(state) {
    //         state.isLoggedIn = false;
    //     }
    // }
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        clearToken(state) {
            state.token = null;
            localStorage.removeItem('token');
        }
    },
    actions: {
    },
    getters: {
        isAuthenticated(state) {

            axios.interceptors.request.use(config => {
                const token = localStorage.getItem('token');
                if (token) {
                    config.headers.Authorization = `Bearer ${token}`;
                }
                return config;
            });
            
            return state.token !== null;
        }
    }
})

export default store