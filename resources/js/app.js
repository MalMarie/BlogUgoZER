import "./bootstrap";
import { createApp } from "vue";
import index from "./components/index.vue";
import articles from "./components/articles.vue";
import backofficeIndex from "./components/backofficeIndex.vue";
import backofficeCreateArticle from "./components/backofficeCreateArticle.vue";

createApp(index).mount("#index");
createApp(articles).mount("#articles");
createApp(backofficeIndex).mount("#backofficeIndex");
createApp(backofficeCreateArticle).mount("#backofficeCreateArticle");
