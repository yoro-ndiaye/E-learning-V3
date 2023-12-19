@extends('stagiaire.leftmenu')
@section('content')

<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Actualité </span></div>

@if (session('success'))
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
    <p class="font-bold">Success!</p>
    <p>{{session('success')}}.</p>
</div>
@endif

<div class="flex container mx-auto justify-center bg-gray-700  pl-5 pr-5 pb-11  rounded-3xl">
    <div class="flex w-1/3 justify-center items-center ">
        <div class="relative">
            <img src="{{ Auth::guard('stagiaire')->user()->photo ? asset('photoprofil/'.Auth::guard('stagiaire')->user()->photo) : asset('defaulte/userdefaulte.png') }}" alt="" srcset="" class="rounded-full w-48 h-48">
        </div>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($tachesStagiaires as $tache)
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold">{{ $tache->cour->nomCours }}</h3>
                        <p>{{ $tache->tacheDescription }}</p>
                        <p class="text-sm text-gray-500">
                            Par {{ $tache->stagiaire->nom }} {{ $tache->stagiaire->prenom }}
                            le {{ $tache->created_at->format('d/m/Y H:i') }}
                        </p>
                        <ul>
                            @foreach ($tacheFiles->where('tache_stagiaires_id', $tache->id) as $file)
                            <li>
                                @if (in_array(pathinfo($file->name, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif', 'bmp']) ) 
                                <img src="{{ url("/uploads/{$file->name}") }}" alt="{{ $file->name }}" style="max-width: 100px; max-height: 100px;">
                                @else
                                <a class="fw-bold text-primary" href="{{ url("/uploads/{$file->name}") }}" target="_blank">
                                    {{ pathinfo($file->name, PATHINFO_EXTENSION) }}  
                                </a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                            <br>
                        <!-- Bouton pour rediriger vers la page détaillée -->
                        <a href="{{ route('actualites.details.show', $tache->id) }}" class="bg-blue-500 text-white px-4 py-2 mt-2">Affiche détails</a>
                    </div>
                    @endforeach

                    {{ $tachesStagiaires->links() }} <!-- Pour la pagination -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
