import { createApp } from 'vue'
import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import AuraCustomPreset from "./manager/theme.js"
import App from './manager/App.vue'
import router from "./manager/router.js"
import 'primeicons/primeicons.css'

const app = createApp(App)

app.use(router)
app.use(PrimeVue, {
    theme: AuraCustomPreset
})
app.use(ConfirmationService)
app.use(ToastService);
app.mount('#manager')
