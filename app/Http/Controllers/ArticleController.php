<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Database\Factories\ArticleFactory;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller // implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function allArticles()
    {
        return view('articles.articles');
    }

    /**
     * Méthode pour afficher un seul article.
     */
    public function show(string $id)
    {
        $article = Article::take($id)->get();
        return view('article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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

    /**
     * Méthode pour l'API pour récupérer un article en fonction de son id
     */
    public function oneArticleById(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Get the middleware that should be assigned to the controller.
     */
    // public static function middleware(): array
    // {
    //     return [
    //         'auth',
    //         new Middleware('log', only: ['index']),
    //         new Middleware('subscribed', except: ['store']),
    //     ];
    // }
}
