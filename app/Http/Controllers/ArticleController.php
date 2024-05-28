<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Database\Factories\ArticleFactory;

class ArticleController extends Controller
{
    //
    // Partie client
    //

    /**
     * Méthode pour afficher l'accueil.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Méthode pour afficher la page de tous les articles
     */
    public function allArticles()
    {
        return view('articles.articles');
    }

    /**
     * Méthode pour récupérer un article en fonction de son id
     */
    public function oneArticleById(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }



    //
    // Partie backoffice
    //



    /**
     * Méthode pour afficher l'accueil du backoffice.
     */
    public function backIndex()
    {
        $articles = Article::all();
        $articlesCount = $articles->count();
        return view('backoffice.index', compact('articles'));
    }

    /**
     * Méthode pour afficher la page de création d'un article.
     */
    public function create()
    {
        return view('backoffice.add');
    }

    /**
     * Méthode pour enregistrer le nouvel article.
     */
    public function store(Request $request)
    {
        // dd('request', $request->all());

        $validated = $request->validate([
            'title' => 'required|max:120',
            'content' => 'required',
            'category' => 'required|max:50',
            'image_url' => 'required|url',
            'created_at' => now()
        ]);

        // dd('dd', $validated);

        $newArticle = Article::create($validated);

        return redirect()->route('backoffice.index')->with('success', 'Article créé avec succès.');
    }

    /**
     * Méthode pour afficher un article à modifer.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Méthode pour afficher un article à modifer.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('backoffice.edit', compact('article'));
    }

    /**
     * Méthode pour enregistrer l'article modifié.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:120',
            'content' => 'required',
            'category' => 'required|max:50',
            'image_url' => 'required|url',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);

        return redirect()->route('backoffice.index')->with('success', 'Article modifié avec succès.');
    }

    /**
     * Méthode pour supprimer un article.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('backoffice.index')->with('success', 'Article supprimé avec succès.');
    }



    //
    // API
    //



    /**
     * Méthode pour l'API pour récupérer les 5 derniers articles
     */
    public function showLastFive()
    {
        $lastArticles = Article::orderBy('created_at', 'desc')->take(5)->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'content' => $article->content,
                'category' => $article->category,
                'created_at' => $article->created_at,
                'url' => route('article.show', $article->id),
            ];
        });
        return response()->json($lastArticles);
    }

    /** 
     * Méthode pour l'API pour récupérer tous les articles
     */
    public function showAll()
    {
        $articles = Article::all()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'content' => $article->content,
                'category' => $article->category,
                'image_url' => $article->image_url,
                'created_at' => $article->created_at,
                'url' => route('article.show', $article->id),
            ];
        });

        $articleCount = $articles->count();
        return response()->json([
            'articles' => $articles,
            'total' => $articleCount
        ]);
    }
}
