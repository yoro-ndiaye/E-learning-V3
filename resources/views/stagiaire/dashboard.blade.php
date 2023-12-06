@extends('stagiaire.leftmenu')
@section('content')

<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Dashbord </span></div>

@if (session('success'))
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
    <p class="font-bold">Sucess!</p>
    <p>{{session('success')}}.</p>
  </div>
@endif
<div class=" flex container mx-auto justify-center bg-gray-700  pl-5 pr-5 pb-11  rounded-3xl">

    <div class="flex w-1/3 justify-center items-center ">
        <div class="relative">
            <img src="{{Auth::guard('stagiaire')->user()->photo ? asset('photoprofil/'.Auth::guard('stagiaire')->user()->photo): asset('defaulte/userdefaulte.png') }}" alt="" srcset="" class="rounded-full w-48 h-48">

        </div>
    </div>

    <div class=" container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-gray-800">Profil de stagiaire</h1>
            <div class="flex">
                <div class=" mr-4 pr-4">
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
                        <label class="text-gray-600">telephone :</label>
                        <p class="text-blue-500 font-semibold">{{ Auth::guard('stagiaire')->user()->telephone }}</p>
                    </div>
                </div>
                <div class="ml-4 pl-4">
                    @if (Auth::guard('stagiaire')->user()->adresse != null)
                    <div class="mt-2">
                        <label class="text-gray-600">Adresse:</label>
                        <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->adresse }}</p>
                    </div>
                    @endif
                    @if (Auth::guard('stagiaire')->user()->date_naissance != null)
                    <div class="mt-4">
                        <label class="">Date de naissance :</label>
                        <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->date_naissance }}</p>
                    </div>
                    @endif
                    @if (Auth::guard('stagiaire')->user()->lieu_naissance != null)
                    <div class="mt-4">
                        <label class="text-gray-600">lieu de naissance :</label>
                        <p class="text-gray-800 font-semibold">{{ Auth::guard('stagiaire')->user()->lieu_naissance }}</p>
                    </div>
                    @endif


                </div>

            </div>

        </div>


        <div class="mt-4 flex">
            <div class="mr-4">
                <a  href="{{ route('stagiaires.edit', Auth::guard('stagiaire')->user()->id) }}" class="btn inline-block bg-white hover:bg-gray-600 hover:text-white text-black font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">Completer le profil</a>

            </div>
            <div>
                <a  href="{{ route('stagiaires.changemotdepasse', Auth::guard('stagiaire')->user()->id) }}" class="btn inline-block bg-white  hover:bg-gray-600 hover:text-white text-black font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">changer de mot de passe</a>
            </div>
        </div>
    </div>
</div>

    @endsection
