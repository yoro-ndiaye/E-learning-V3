@extends('stagiaire.leftmenu')
@section('content')

<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Modules en {{ Auth::guard('stagiaire')->user()->domaine->nomDomaine  }} </span></div>

<div class=" flex container mx-auto justify-center bg-gray-700   rounded-3xl">

    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-2">
          <!--gregregr Carte du module 1 -->
            @if ($modules->count() == 0)
            <h1 class="text-2xl font-semibold text-white ">Aucun module</h1>
            @endif
          @foreach ($modules as $m)
       <a href="{{ route('stagiaires.courstagiaire', $m->id) }}"">
        <div class="bg-white p-6 rounded-lg shadow-md h-full">
            <img src="{{ asset('images/'.$m->image) }}" alt="" srcset="" class="w-full h-32 object-cover">
            <h2 class="text-xl font-semibold text-gray-800">{{ $m->nomModule }}</h2>
            <p class="text-gray-600">{{ Str::limit(htmlspecialchars_decode(strip_tags($m->description)), 80) }}</p>
        </div>
        </a>
          @endforeach


        </div>
      </div>

    </div>



    @endsection
