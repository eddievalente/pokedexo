
import { createApp } from 'vue';

import axios from 'axios'
import VueAxios from 'vue-axios'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'

library.add(faPlusSquare, faTrash)


import App from './vue/app'

const app = createApp(App)

app.use(VueAxios, axios)

app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')
