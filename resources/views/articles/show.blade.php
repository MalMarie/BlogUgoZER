@extends('base')

@section('title', 'Un article')

@section('article')

<div class="container mx-auto">
    <div class=" flex max-w-2xl mx-auto my-8 p-6 bg-white rounded-lg shadow-md">
        <img class="shadow-lg rounded-lg mr-9" src={{ $article->image_url }} alt="Image d'illustration">
        <div class="text-neutral-600">
            <h2 class="text-2xl font-bold mb-4">{{ $article->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $article->content }}</p>
            <p class="text-gray-500">Catégorie: {{ $article->category }}</p>
            <p class="text-gray-500">Publié le: {{ \Carbon\Carbon::parse($article->created_at)->format('d m Y') }}</p>
        </div>
    </div>
</div>

@endsection