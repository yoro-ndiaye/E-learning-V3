<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
            <div class="mt-20 flex container mx-auto justify-center bg-gray-800   rounded-3xl">

                {{-- <div class="container mx-auto sm:px-6 lg:px-8"> --}}
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container-flex mx-auto">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                              <!-- Card 1 -->
                            @foreach ($count as $count )
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $count->nomDomaine }}</h2>
                                <p class="text-2xl font-bold text-blue-500">{{ $count->count }}</p>
                                <p class="text-gray-600">{{ number_format(($count->count / count($stagiaire) * 100), 2) }} %</p>
                              </div>

                            @endforeach

                              <!-- Card 2 -->


                              <!-- Card 5 -->
                              <div class="bg-white p-4 rounded-lg shadow-md">
                                <h2 class="text-xl font-semibold text-gray-800">Total</h2>
                              <p class="text-2xl font-bold text-blue-500">{{ count($stagiaire) }}</p>
                                <p class="text-gray-600">11.67%</p>
                              </div>
                            </div>
                          </div>

                      <div class="flex justify-between items-center mb-4">
                          <!-- Bouton "Ajouter" en haut à droite -->
                          <a class=" mt-3 bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded" href="{{ route('stagiaires.create') }}">
                            Ajouter un stagiaire
                          </a>
                        </div>
                      <table class="min-w-full ">
                        <thead>
                          <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                             prenom
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            nom
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            email
                             </th>
                             <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                             telephone
                               </th>
                               <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                domaine
                                  </th>
                                  <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    etat
                                      </th>
                                  <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    option
                                      </th>
                            <!-- Ajoutez plus d'en-têtes de colonnes si nécessaire -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($stagiaire as $stagiaire)


                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                            {{ $stagiaire->prenoms }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                            {{ $stagiaire->nom }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                              {{ $stagiaire->email }}

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                {{ $stagiaire->telephone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                {{ $stagiaire->domaine->nomDomaine }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                                <a href="{{ route('stagiaires.etat',$stagiaire->id) }}"  class="text-gray-600  p-2 rounded-2xl {{ $stagiaire->status ? "bg-green-600" : "bg-red-600" }}">
                               {{ $stagiaire->status ? "Actif" : "Inactif" }}
                                </a>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                              <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded m-2" href="{{ route('stagiaires.showStagiaire', $stagiaire->id) }}">
                                <i class="fas fa-eye ml-1"></i>
                              </a>
                              <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded mr-2" href="{{ route('stagiaires.updateStagiaire', $stagiaire->id) }}">
                                <i class="fas fa-edit ml-1"></i>
                              </a>
                              <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded" href="">

                                <i class="fas fa-trash ml-1"></i>
                              </a>
                              </td>
                            <!-- Ajoutez plus de cellules pour chaque ligne de données -->
                          </tr>
                          @endforeach

                          <!-- Ajoutez plus de lignes de données si nécessaire -->
                        </tbody>
                      </table>
                    {{-- </div>
                  </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
