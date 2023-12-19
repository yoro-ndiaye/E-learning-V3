<!-- resources/views/actualites/details/show.blade.php -->

@extends('stagiaire.leftmenu')

@section('content')
    <div class="mt-20 mb-4 ml-4 ">
        <span class="text-2xl bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Détails du fichier partager</span>
    </div>

    <div class="justify-center bg-gray-700 text-white pl-5 pr-5 pb-11 rounded-3xl p-3">
        <h1 class="text-2xl font-semibold">{{ $tacheStagiaire->cour->nomCours }}</h1>
        <div class="mt-4">
            <p class="text-larger text-gray-500 font-bold">
                Par {{ $tacheStagiaire->stagiaire->nom }} {{ $tacheStagiaire->stagiaire->prenom }}
                le {{ $tacheStagiaire->created_at->format('d/m/Y H:i') }}
            </p>
        </div>
        <br>
        <p>{{ $tacheStagiaire->tacheDescription }}</p>

       

        <div class="mt-4">
            <p>Fichier partagé :</p>
            <ul>
                @foreach ($tacheFiles->where('tache_stagiaires_id', $tacheStagiaire->id) as $file)
                <li>
                    @if (in_array(pathinfo($file->name, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif', 'bmp']))
                    <img src="{{ url("/uploads/{$file->name}") }}" alt="{{ $file->name }}" style="max-width: auto; max-height: auto;">
                    @else
                    <a href="{{ url("/uploads/{$file->name}") }}" target="_blank">
                        {{ pathinfo($file->name, PATHINFO_BASENAME) }}
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
