@extends('base')

@section('title', 'Modifier un article')

@section('editArticle')

<button><a href=" {{ route('backoffice.index') }} ">Retour à l'accueil du backoffice</a></button>

<h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">Modifier l'article : <span class="italic">{{$article->title }}<span>( {{ $article->id }})</h2>

<div>
    <form action="{{ url('backoffice/articles/'.$article->id) }}" method="POST" class="m-auto block border rounded-md border-2 w-3/6 h-2/6 p-2 m-2">
        @csrf
        @method('PUT')
        <label for="title">Titre :</label>
        <input type="text" name="title" class="block w-full" value="{{ old('title', $article->title)}}">
        <label for="content">Contenu :</label>
        <textarea name="content" class="block w-full">{{ old('content', $article->content)}}</textarea>
        <label for="category">Catégorie :</label>
        <input type="text" name="category" class="block w-full" value="{{ old('category', $article->category)}}">
        <label for="image url">Lien de l'image d'illustration</label>
        <input type="url" name="image_url" class="block w-full" value="{{ old('image_url', $article->image_url)}}">

        <button type="submit" class="border rounded-md border-green-900 bg-green-600 p-2 mt-2">Enregistrer</button>

    </form>
</div>


@endsection