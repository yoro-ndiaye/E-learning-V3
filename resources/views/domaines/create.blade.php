<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter Domaine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- Formulaire pour ajouter un domaine -->
                        <form action="{{ route('domaines.store') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full">
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Ajouter un domaine</span>
                      
                          <!-- Champ d'entrée pour le nom de domaine -->
                          <div class="m-4">
                            <label for="domainName" class="block text-gray-700 text-sm font-bold mb-2">Domain Name:</label>
                            <input type="text" id="domainName" name="nomDomaine" placeholder="Entrez le nom du domaine" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('nomDomaine')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                 </div>
                     
                      
                          <!-- Champ d'entrée pour la description -->
                          <div class="m-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" rows="4" placeholder="Entrez une description du domaine" class="w-full px-3 py-2 border rounded-md border-gray-300 resize-none focus:outline-none focus:ring focus:border-blue-500 text-gray-900"></textarea>
                            @error('nomDomaine')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                        </div>
                      
                          <!-- Bouton de soumission du formulaire -->
                          <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                              Ajouter le domaine
                            </button>
                          </div>
                        </form>
                      </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>