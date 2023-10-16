<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body >





<div class="flex  bg-gray-300   rounded-sm rounded-3xl">


     <div class="w-1/2 h-screen text-gray-900 dark:text-gray-100 first-line: ">

            <!-- Formulaire pour ajouter un domaine -->
            <img  src="{{ asset('img/acc.jpg') }}" alt="Image" class="h-screen w-full">


    </div>
    <div class="w-1/2 text-gray-900 dark:text-gray-100 pt-20 mt-10">

      <div class="flex justify-center">
        <img src="{{ asset('img/logo-defarsci.png') }}" alt="" srcset="" class=" h-22 w-20">
      </div>

            <!-- Formulaire pour ajouter un domaine -->
            <div class="p-10 text-gray-900 dark:text-gray-100 m-12 ">
              @if (Session::has('error'))

              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erreur!</strong>
                <span class="block sm:inline">{{ Session::get('error') }}</span>
              </div>


             @endif
              <div>
                <h4 class="text-2xl text-black font-semibold p-3">Utilisez l'email que vous avez donner l'hors de l'entretien pour vous connecter et pour le mot de passe c'est <strong> passer123</strong></h4>
              </div>
            <form action="{{ route('stagiaires.login') }}" method="POST" class=" mx-auto p-4 bg-white rounded shadow-md min-w-full" enctype="multipart/form-data" >
             @csrf
                {{-- <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Ajouter un Cour</span> --}}

              <!-- Champ d'entrée pour le nom de domaine -->
              <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Adresse e-mail:</label>
                <input type="email" id="email" name="email" class="text-gray-700 w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>

                @enderror
            </div>
              <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Mot de passe:</label>
                <input type="password" id="password" name="password" class="text-gray-700 w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
            @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>

            @enderror
            </div>
              <div class="mb-6 w-1/2 mx-auto">
                <button type="submit" class="w-full bg-gray-800 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                  Connexion
                </button>
              </div>
              {{-- <p class="text-gray-600 text-sm">Pas encore de compte ? <a href="#" class="text-blue-500">Inscrivez-vous</a></p> --}}
            </form>
          </div>
          </div>

    </div>




    </body>
</html>
