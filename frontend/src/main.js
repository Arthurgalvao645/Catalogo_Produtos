import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
import router from "./router";  // Tente este caminho mais explícito se o anterior falhar
import 'material-design-lite/dist/material.min.css';
import 'material-design-lite/dist/material.min.js';

createApp(App)
  .use(router) // Usa o router
  .mount("#app");
