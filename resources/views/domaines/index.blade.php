<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Domaines') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-4">
                            <!-- Bouton "Ajouter" en haut à droite -->
                            <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded" href="{{ route('domaines.create') }}">
                              Ajouter un domaine
                            </a>
                          </div>
                        <table class="min-w-full">
                          <thead>
                            <tr>
                              <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                               Domaine Name
                              </th>
                              <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                               Description
                              </th>
                              <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Option
                               </th>
                              <!-- Ajoutez plus d'en-têtes de colonnes si nécessaire -->
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($domaine as $domaine) 
                                
                            
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                {{ $domaine->nomDomaine }}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                {{ $domaine->description}}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded m-2" href="{{ route('domaines.addmodule',$domaine->id) }}">
                                  Ajouter un module
                                </a>
                                <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded mr-2" href="{{ route('domaines.update',$domaine->id) }}">
                                  <i class="fas fa-edit ml-1"></i>
                                </a>
                                <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded" href="{{ route('domaines.delete',$domaine->id) }}">
                                 
                                  <i class="fas fa-trash ml-1"></i>
                                </a>
                              </td>
                              <!-- Ajoutez plus de cellules pour chaque ligne de données -->
                            </tr>
                            @endforeach
                           
                            <!-- Ajoutez plus de lignes de données si nécessaire -->
                          </tbody>
                        </table>
                      </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
