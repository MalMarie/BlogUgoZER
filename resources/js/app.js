import "./bootstrap";
import { createApp } from "vue";
import header from "./components/header.vue";
import nav from "./components/nav.vue";
import app from "./components/app.vue";
import footer from "./components/footer.vue";

createApp(header).mount("#header");
createApp(nav).mount("#nav");
createApp(app).mount("#app");
createApp(footer).mount("#footer");
