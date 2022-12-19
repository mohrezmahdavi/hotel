require('./bootstrap')

import { createApp } from 'vue'
import IndexComponent from './components/Index/Index.vue'

const app = createApp({})

app.component('index-com', IndexComponent)

app.mount('#app')
