@extends('stagiaire.leftmenu')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- Formulaire pour ajouter un domaine -->
                        <form action="{{ route('stagiaires.updatepassword') }}" method="POST" class="max-w-md mx-auto p-4 bg-white rounded shadow-md min-w-full" enctype="multipart/form-data">
                         @csrf
                            <span class="text-xl font-semibold mb-4 text-white font-bold py-2 px-4 rounded bg-indigo-600">Modifier le mot de passe</span>
                            <input hidden type="text" id="" name="id" placeholder="" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900" value="{{ $stagiaire->id }}">

                          <!-- Champ d'entrée pour le nom de domaine -->


                           <div class="m-4">
                            <label for="=current_password" class="block text-gray-700 text-sm font-bold mb-2">mot de passe actuel:</label>
                            <input type="password" id="current_password" name="current_password" placeholder="Entrez le lieu de naissance" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('current_password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                            @if (session('errore'))
                                <div class="alert alert-success alert-dismissable m-3">

                            <p class="text-red-500 text-xs italic">{{session('errore')}}</p>

                                </div>
                            @endif
                           </div>
                           <div class="m-4">
                            <label for="=password" class="block text-gray-700 text-sm font-bold mb-2">nouvau mot de passe:</label>
                            <input type="password" id="password" name="password" placeholder="Entrez le lieu de naissance" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                          @if (session('identique'))
                                <div class="alert alert-success alert-dismissable m-3">
                                    <p class="text-red-500 text-xs italic"> {{session('identique')}}</p>
                                </div>
                            @endif
                           </div>
                           <div class="m-4">
                            <label for="=confirm_password" class="block text-gray-700 text-sm font-bold mb-2">confirme mot de passe:</label>
                            <input type="password" id="password" name="confirm_password" placeholder="Entrez le lieu de naissance" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring focus:border-gray-700 text-gray-900">
                            @error('confirm_password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                          @enderror
                          @if (session('identique'))
                                <div class="alert alert-success alert-dismissable m-3">

                            <p class="text-red-500 text-xs italic"> {{session('identique')}}</p>

                                </div>
                            @endif
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
