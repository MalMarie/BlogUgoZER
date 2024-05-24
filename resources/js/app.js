import "./bootstrap";
import { createApp } from "vue";
import index from "./components/index.vue";
import articles from "./components/articles.vue";

createApp(index).mount("#index");
createApp(articles).mount("#articles");
