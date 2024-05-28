<template>
    <div class="container m-auto w-3/4 mt-9">
        <h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">Backoffice</h2>
        <h3>Nombre d'articles : {{ totalArticles }}</h3>
        <button @click="goToAdd(url)">Créer un nouvel article</button>
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
            <tbody>
                <tr
                    class="border border-2 border-slate-400"
                    v-for="(article, index) in allArticles"
                    :key="index"
                >
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
                </tr>
                <tr>
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
            allArticles: [],
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
                this.allArticles = response.data.articles;
                this.totalArticles = response.data.total;
                console.log("liste des articles", this.allArticles);
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
        goToAdd(url) {
            url = 'backoffice/add';
            window.location.href = url;
        },
    },
};
</script>
