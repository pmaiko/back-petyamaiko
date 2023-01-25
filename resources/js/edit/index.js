import * as Vue from 'vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import App from './components/App.vue'

const { createApp } = Vue
const app = createApp(App)
app.component('QuillEditor', QuillEditor)
app.mount('#app')