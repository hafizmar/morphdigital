import './bootstrap';

/* import Vue library */
import { createApp } from 'vue'
import App from './vue/layouts/app.vue'

/* router for Vue */
import router from './vue/router/web.js'

/* import global js */
import globalJs from './vue/admin/global.js'

/* import vuex statemgmt */
import store from './vue/data/vuex.js'

/* add fontawesome to Vue */
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHouse, faListCheck, faPenToSquare, faTrash, faGears, faUserTie, faPowerOff } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* add icons to the fontawesome library */
library.add(faHouse, faListCheck, faPenToSquare, faTrash, faGears, faUserTie, faPowerOff)

const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.use(store)
app.mixin(globalJs)
app.mount("#app")