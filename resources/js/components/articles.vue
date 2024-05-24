<template>
    <div>
        <div
            class="flex flex-row flex-wrap justify-center"
            v-if="articles.length > 0"
        >
            <div
                class="relative w-full max-w-96 bg-blue-600 m-4 p-4 rounded border-zinc-50 h-full max-h-80 overflow-y-auto"
                v-for="(article, index) in articles"
                :key="index"
            >
                <h2 class="text-xl text-bold mt-3 pb-3">{{ article.title }}</h2>
                <p class="text-sm italic absolute top-3 right-3">
                    {{ article.category }}
                </p>
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
        this.fetcharticles();
    },
    methods: {
        async fetcharticles() {
            try {
                const response = await axios.get(
                    "http://localhost:8000/api/all-articles"
                );
                this.articles = response.data;
                console.log("liste des articles", this.articles);
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
