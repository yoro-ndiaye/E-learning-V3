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

       

        <div class="mt-4 mb-4">
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
        <div class="space-y-10 md:space-y-16">
            <form action="{{ route('actualites.details.comment', ['tacheStagiaire' => $tacheStagiaire]) }}" method="post">
                @csrf
                <div class="flex h-12">
                    <input class="w-full bg-slate-50 rounded-lg px-5 text-indigo-900 focus-outline focus-outline-2 focus-outline-indigo-500" 
                        type="text" name="comment" placeholder="Ajouter votre commentaire..." autocomplete="off">
                    <button class="ml-2 w-12 flex justify-center items-center shrink-0 bg-indigo-700 rounded-full text-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-code" width="24" height="24" 
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" 
                            stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> 
                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /> 
                            <path d="M10 9l-2 2l2 2" /> <path d="M14 9l2 2l-2 2" /> 
                        </svg>
                    </button>
                </div>
            </form>
            <div class="space-y-8">
                @foreach ($comments as $comment)
                <div class="flex bg-slate-50 p-6 rounded-lg">
                    <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ $comment->stagiaire->photo ? asset('photoprofil/'.$comment->stagiaire->photo) : asset('defaulte/userdefaulte.png')}}" 
                    alt="Image de profil de {{$comment->stagiaire->prenoms}} {{$comment->stagiaire->nom}}">
                    <div class="ml-4 flex flex-col">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <h2 class="font-bold text-slate-900 text-2xl">{{ $comment->stagiaire->prenoms}} {{$comment->stagiaire->nom}}</h2>
                            <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{$comment->created_at}}">
                                {{ $comment->created_at }}
                            </time>
                        </div>
                        <p class="mt-2 text-slate-800 sm:leading-loose">{{ $comment->content }}</p>
                        @if (Auth::guard('stagiaire')->user()->id === $comment->stagiaire->id)
                            <a href="{{ route('comment.delete', $comment->id)}}"><i class="fa-regular fa-trash-can"></i></a>
                        @endif
                    </div>
                </div>
                @endforeach
                {{ $comments->links() }}
            </div>
        </div>
    </div>
    
@endsection
