<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter Module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- Formulaire pour ajouter un domaine -->
                        <form action="{{ route('cours.edit') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full" enctype="multipart/form-data" >
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Modifier Cour</span>

                          <!-- Champ d'entrée pour le nom de domaine -->
                          <div class="m-4">
                            <input type="text" value="{{ $cour->id }}" name="id" hidden>
                            <label for="module_id" class="block text-gray-700 text-sm font-bold mb-2">Module Cour</label>
                            <select name="module_id" id="module_id"  placeholder="Entrez le nom du domail" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                                <option value="{{$cour->module->id}}">{{ $cour->module->nomModule }}</option>
                                @foreach ($module as $module)
                                <option value="{{ $module->id }}">{{ $module->nomModule }}</option>
                                @endforeach

                            </select>
                            @error('module_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                           <div class="m-4">
                            <label for="nomCours" class="block text-gray-700 text-sm font-bold mb-2">Cour Name:</label>
                            <input type="text" id="nomCours" name="nomCours" placeholder="Entrez le nom du cour" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{$cour->nomCours}}">
                            @error('nomCours')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                           <div class="m-4">
                            <label for="ressource" class="block text-gray-700 text-sm font-bold mb-2">Ressource</label>
                            <input type="text" id="ressource" name="ressource" placeholder="Entrez le ressource du cour" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{$cour->ressource}}">
                            @error('ressource')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                          <!-- Champ d'entrée pour la description -->
                          <div class="m-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" rows="4" placeholder="Entrez une description du cour" class="w-full px-3 py-2 border rounded-md border-gray-300 resize-none focus:outline-none focus:ring focus:border-blue-500 text-gray-900">{{ $cour->description }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="m-4">
                            <img src="{{ asset('images/cours/'.$cour->image) }}" alt="" srcset="">
                          <label for="imgCours" class="block text-gray-700 text-sm font-bold mb-2">Cour Image:</label>
                          <input type="file" id="imgCours" name="imgCours"  class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                          @error('imgCours')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                         </div>

                          <!-- Bouton de soumission du formulaire -->
                          <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                              Modifier le cour
                            </button>
                          </div>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
