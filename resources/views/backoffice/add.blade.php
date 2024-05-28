@extends('base')

@section('title', 'Ajouter un article')

@section('addArticle')

<button><a href=" {{ route('backoffice.index') }} ">Retour à l'accueil du backoffice</a></button>

<h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">Ajouter un article</h2>
<div class="">
    <form action="{{ url('backoffice/articles') }}" method="POST" class="m-auto block border rounded-md border-2 w-3/6 p-2 m-2">
        @csrf

        <label for="title">Titre :</label>
        <input type="text" class="block w-full" name="title" value="{{ old('title') }}">
        <label for="content">Contenu :</label>
        <textarea name="content" class="block w-full">{{ old('content') }}</textarea>
        <label for="category">Catégorie :</label>
        <input type="text" class="block w-full" name="category" value="{{ old('category') }}">
        <label for="image url">Lien de l'image d'illustration</label>
        <input type="url" class="block w-full" name="image_url" value="{{ old('image_url') }}">

        <button type="submit" class="border rounded-md border-green-900 bg-green-600 p-2 mt-2">Enregistrer</button>

    </form>
</div>

@endsection