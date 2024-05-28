@extends('base')

@section('title', 'Accueil Backoffice')

@section('backofficeIndex')

<!-- <div id="backofficeIndex"></div> -->

<div class="container m-auto w-3/4 mt-9">
    <h2 class="mt-9 ml-9 text-2xl my-9 w-full text-center">Backoffice</h2>

    <button>
        <a href="{{ route('backoffice.add') }}" class="border-2 rounded-md border-green-600 my-1 px-4">
            Créer un nouvel article
        </a>
    </button>
    <table class="border border-4 border-slate-400">
        <thead>
            <tr class="border border-2 border-slate-400">
                <th class="border">Id</th>
                <th class="border">Titre</th>
                <th class="border">Contenu</th>
                <th class="border">Catégorie</th>
                <th class="border">Lien url de l'image</th>
                <th class="border">Date de création</th>
                <th class="border">Date de modification</th>
                <th class="border border-4 border-slate-400">Actions</th>
            </tr>
        </thead>
        @foreach ($articles as $article)
        <tbody>
            <tr class="border rounded-md border-2 border-slate-400">
                <td class="border p-4 text-center">
                    {{ $article->id }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->title }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->content }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->category }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->image_url }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->created_at }}
                </td>
                <td class="border p-4 text-center">
                    {{ $article->updated_at }}
                </td>
                <td class="border border-4 border-slate-400 p-5">
                    <button class="border-2 rounded-md border-x-amber-600 my-1 px-4">
                        <a href="{{ url('backoffice/articles/update/'.$article->id) }}">Modifier</a>
                    </button>
                    <form action="{{ url('backoffice/articles/'.$article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="border-2 rounded-md border-x-amber-950 my-1 px-2" type="submit">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@endsection