import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import LoginForm from './components/LoginForm.vue'

const app = createApp({});
app.component('example-component', ExampleComponent);
app.component('login-form', LoginForm);
app.mount('#app');
