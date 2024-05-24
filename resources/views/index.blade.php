@extends('base')

@section('title', 'Accueil')

@section('index')

<div class="flex">
    <aside class="my-9 p-9 w-2/4 w-6/12 m-auto text-center content-center justify-center text-2xl">
        <p>
            Ah, l'immobilier... Ce n'est pas toujours évident, n'est-ce pas? <br> Entre les questions qu'on se pose et pour lesquelles on ne trouve pas de réponse, ou les questions qu'on oublie de se poser, cela ne nous facilite pas la tâche.
        </p>
        <p>
            Combien de fois êtes-vous resté éveillé toute la nuit à vous demander "mais pourquoi je n'ai pas vu ça venir?!"
        </p>
        <p>
            Heureusement pour vous, vous êtes tombés à la bonne adresse ! <span class="italic text-sm">("adresse", "adresse internet" vous l'avez??)</span>
        </p>
        <p>
            Ce blog a été créé pour vous, pour ne plus manquer de sommeil avec des questions toutes aussi nombreuses que de travaux que vous pourriez avoir à faire chez vous.
        </p>
    </aside>

    <div>
        <h2 class="mt-9 ml-9 text-2xl text-center">
            Les derniers articles ajoutés :
        </h2>
        <div id="index"></div>
    </div>
</div>
@endsection