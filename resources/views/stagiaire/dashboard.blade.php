@extends('stagiaire.leftmenu')
@section('content')

<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Dashbord </span></div>

<div class=" flex container mx-auto justify-center bg-gray-700  pl-5 pr-5 pb-11  rounded-3xl">

    <div class="flex w-1/3 justify-center items-center ">
        <div class="relative">
            <img src="{{ asset('img/acc.jpg') }}" alt="" srcset="" class="rounded-full w-48 h-48">

        </div>
    </div>



    <div class=" container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-gray-800">Profil de stagiaire</h1>
            <div class="mt-4">
                <label class="text-gray-600">Nom :</label>
                <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->nom }}</p>
            </div>
            <div class="mt-4">
                <label class="text-gray-600">Prenom :</label>
                <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->prenoms }}</p>
            </div>
            <div class="mt-2">
                <label class="text-gray-600">Adresse e-mail :</label>
                <p class="text-blue-500 font-semibold">{{ Auth::guard('stagiaire')->user()->email }}</p>
            </div>

            <div class="mt-2">
                <label class="text-gray-600">Adresse:</label>
                <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->adresse }}</p>
            </div>

        </div>
        <div class="mt-4">
            <a class="btn inline-block bg-white hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">modifier profil</a>
        </div>
    </div>



    @endsection
