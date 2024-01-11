@extends('stagiaire.leftmenu')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- Formulaire pour ajouter un domaine -->
                        <form action="{{ route('stagiaires.updateProfil') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full" enctype="multipart/form-data">
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Modifier le profil</span>
                            <input hidden type="text" id="" name="id" placeholder="" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{ $stagiaire->id }}">

                          <!-- Champ d'entrée pour le nom de domaine -->
                          <div class="m-4">
                            <label for="prenoms" class="block text-gray-700 text-sm font-bold mb-2">Date de Naissance:</label>
                            <input type="date" id="prenoms" name="date_naissance" placeholder="Entrez la date de naissance" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{ $stagiaire->date_naissance }}">
                            @error('date_naissance')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                           <div class="m-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Lieu de Naissance:</label>
                            <input type="text" id="nom" name="lieu_naissance" placeholder="Entrez le lieu de naissance" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{ $stagiaire->lieu_naissance }}">
                            @error('lieu_naissance')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>
                           <div class="m-4">
                            <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adress:</label>
                            <input type="text" id="adresse" name="adresse" placeholder="Entrez l'adresse" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{ $stagiaire->adresse }}">
                            @error('adresse')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>
                           <div class="m-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">photo de profil:</label>
                            <input type="file" id="" name="photo" placeholder="choisi  votre photo de profile" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" ">
                            @error('photo')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                          <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                             Modifier
                            </button>
                          </div>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
@endsection
