<template>
    <div class="bg-red-900">
        <h1 class="text-lime-500">Hello World</h1>

        <div v-if="articles.length > 0">
            <div v-for="(article, index) in articles" :key="index">
                <h2>article{{ article.title }}</h2>
                <p>{{ article.content }}</p>
            </div>
        </div>
        <div v-else>
            <p>No articles available.</p> 
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            articles: [],
        };
    },
    created() {
        this.fetchArticles();
    },
    methods: {
        async fetchArticles() {
            try {
                const response = await axios.get(
                    "http://localhost:8000/api/articles"
                );
                this.articles = response.data;
                console.log("liste des articles", this.articles[0]);
            } catch (error) {
                console.error(
                    "There was an error fetching the articles:",
                    error
                );
            }
        },
    },
};
</script>
