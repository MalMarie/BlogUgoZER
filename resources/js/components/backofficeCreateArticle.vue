<template>
    <div class="container m-auto w-3/4 mt-9">
        <h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">Backoffice : Créer un nouvel article</h2>
        <button>Créer un nouvel article</button>
        <table class="border border-4 border-slate-400">
            <thead>
                <tr class="border border-2 border-slate-400">
                    <th class="border">Titre</th>
                    <th class="border">Contenu</th>
                    <th class="border">Catégorie</th>
                    <th class="border">Lien url de l'image</th>
                    <th class="border">Date de création</th>
                    <th class="border">Date de modification</th>
                    <th class="border border-4 border-slate-400">Actions</th>
                </tr>
            </thead>
            <tbody v-for="(article, index) in articles" :key="index">
                <tr class="border border-2 border-slate-400">
                    <td class="border p-4 text-center">
                        {{ article.title }}
                    </td>
                    <td class="border p-4 text-center">
                        {{ article.content }}
                    </td>
                    <td class="border p-4 text-center">
                        {{ article.category }}
                    </td>
                    <td class="border p-4 text-center">
                        {{ article.image_url }}
                    </td>
                    <td class="border p-4 text-center">
                        {{ formatDate(article.created_at) }}
                    </td>
                    <td class="border p-4 text-center">
                        {{ formatDate(article.updated_at) }}
                    </td>
                    <td class="border border-4 border-slate-400 p-5">
                        <button class="border-2 border-x-amber-600 my-1 px-4">
                            Modifier
                        </button>
                        <button class="border-2 border-x-amber-950 my-1 px-2">
                            Supprimer
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { format } from "date-fns";

import axios from "axios";

export default {
    data() {
        return {
            articles: [],
        };
    },
    created() {
        this.fetchAllArticles();
    },
    methods: {
        async fetchAllArticles() {
            try {
                const response = await axios.get(
                    "http://localhost:8000/api/all-articles", { 
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    });
                this.articles = response.data.articles;
                console.log("liste des articles", this.articles);
            } catch (error) {
                console.error(
                    "There was an error fetching the articles:",
                    error
                );
            }
        },
        formatDate(date) {
            return format(new Date(date), "d/MM/yy");
        },
        goToArticle(url) {
            window.location.href = url;
        },
    },
};
</script>
