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
                        <form action="{{ route('module.edit') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full" enctype="multipart/form-data" >
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Modifier le Module</span>
                            <input type="text" value="{{ $module->id }}" name="id" hidden>
                          <!-- Champ d'entrée pour le nom de domaine -->
                          <div class="m-4">
                            <label for="domaine" class="block text-gray-700 text-sm font-bold mb-2">Module domaine</label>
                            <select name="domaine" id="domaine"  placeholder="Entrez le nom du domail" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                                <option value="{{ $module->domaine->id }}">{{ $module->domaine->nomDomaine }}</option>
                                @foreach ($domaine as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->nomDomaine }}</option>
                                @endforeach

                            </select>
                            @error('domaine')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>

                           <div class="m-4">
                            <label for="nomModule" class="block text-gray-700 text-sm font-bold mb-2">Module Name:</label>
                            <input type="text" id="nomModule" name="nomModule" placeholder="Entrez le nom du module" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{$module->nomModule}}"">
                            @error('nomModule')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                           </div>


                          <!-- Champ d'entrée pour la description -->
                          <div class="m-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" rows="4" placeholder="Entrez une description du domaine" class="w-full px-3 py-2 border rounded-md border-gray-300 resize-none focus:outline-none focus:ring focus:border-blue-500 text-gray-900">{{ $module->description }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="m-4">
                          <img src="{{ asset('images/' .$module->image  ) }}" alt="">
                           </div>
                        <div class="m-4">
                          <label for="imgModule" class="block text-gray-700 text-sm font-bold mb-2">Module Image:</label>
                          <input type="file" id="imgModule" name="imgModule" placeholder="Entrez le nom du module" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                          @error('imgModule')
                          <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                         </div>

                          <!-- Bouton de soumission du formulaire -->
                          <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">
                              Modifier le Module
                            </button>
                          </div>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
