<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter un stagiare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- Formulaire pour ajouter un domaine -->
                        <form action="{{ route('stagiaires.store') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full">
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Ajouter un Stagiaire</span>

                          <!-- Champ d'entrée pour le nom de domaine -->
                          <div class="m-4">
                            <label for="prenoms" class="block text-gray-700 text-sm font-bold mb-2">Prenom:</label>
                            <input type="text" id="prenoms" name="prenoms" placeholder="Entrez le prenom" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('prenoms')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                           <div class="m-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                            <input type="text" id="nom" name="nom" placeholder="Entrez le nom" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('nom')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>
                           <div class="m-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="text" id="email" name="email" placeholder="Entrez l'Email" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>
                           <div class="m-4">
                            <label for="domaine_id" class="block text-gray-700 text-sm font-bold mb-2">Module domaine</label>
                            <select name="domaine_id" id="domaine_id"  placeholder="Entrez le nom du domail" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                                <option value="">Choisir un domaine</option>
                                @foreach ($domaine as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->nomDomaine }}</option>
                                @endforeach

                            </select>
                            @error('domaine_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>
                           <div class="mb-4">
                            <span class="block text-gray-700 text-sm font-semibold mb-2">Sexe:</span>
                            <label class="inline-flex items-center">
                              <input type="radio" name="sexe" value="homme" class="mr-2">
                              <div class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-full cursor-pointer select-none">
                                Homme
                              </div>
                            </label>
                            <label class="inline-flex items-center ml-4">
                              <input type="radio" name="sexe" value="femme" class="mr-2">
                              <div class="bg-pink-500 hover:bg-pink-600 text-white text-sm font-semibold py-2 px-4 rounded-full cursor-pointer select-none">
                                Femme
                              </div>
                            </label>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                              Ajouter le stagiaire
                            </button>
                          </div>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
