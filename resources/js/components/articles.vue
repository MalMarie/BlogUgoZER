<template>
    <div>
        <h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">
            Tous les articles ( {{ totalArticles }})
        </h2>
        <div
            class="flex flex-row flex-wrap justify-center"
            v-if="articles.length > 0"
        >
            <div
                class="relative w-full max-w-96 bg-blue-600 m-4 p-4 rounded border-zinc-50 h-full max-h-80 overflow-y-auto shadow-lg text-slate-50"
                v-for="(article, index) in articles"
                :key="index"
                @click="goToArticle(article.url)"
            >
                <h2 class="text-xl text-bold mt-5 pb-3">{{ article.title }}</h2>
                <p class="text-sm italic absolute top-3 right-3">
                    {{ article.category }} |
                    {{ formatDate(article.created_at) }}
                </p>
                <p>{{ article.content }}</p>
            </div>
        </div>
        <div v-else>
            <p>Pas d'articles disponibles.</p>
        </div>
    </div>
</template>

<script>
import { format } from "date-fns";

import axios from "axios";

export default {
    data() {
        return {
            articles: [],
            totalArticles: 0,
        };
    },
    created() {
        this.fetchArticles();
    },
    methods: {
        async fetchArticles() {
            try {
                const response = await axios.get(
                    "api/all-articles"
                );
                this.articles = response.data.articles;
                this.totalArticles = response.data.total;
                console.log("liste des articles", this.articles);
            } catch (error) {
                console.error(
                    "There was an error fetching the articles:",
                    error
                );
            }
        },
        formatDate(date) {
            return format(new Date(date), "dd MMMM yyyy");
        },
        goToArticle(url) {
            window.location.href = url;
        },
    },
};
</script>
