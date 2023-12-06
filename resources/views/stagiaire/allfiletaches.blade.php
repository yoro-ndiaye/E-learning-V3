@extends('stagiaire.leftmenu')
@section('content')



<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Mes fichier partager  </span></div>

<div class=" flex container mx-auto justify-center bg-gray-700   rounded-3xl">

    <div class="container mx-auto p-4">


          <!--gregregr Carte du module 1 -->


          <table class="min-w-full">
            <thead>
              <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Nom du cour
                   </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                 Description
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                fichier
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                url
                 </th>

                <!-- Ajoutez plus d'en-têtes de colonnes si nécessaire -->
              </tr>
            </thead>

            <tbody>
              @if ($tacheStagiaires->count() == 0)

              <td class="px-6 py-4 text-center text-3xl font-bold text-whith uppercase tracking-wider border-gray-300">
                Aucun filetache disponible pour le moment
              </td>

          @endif
              @foreach ($tacheStagiaires as $c)


              <tr>
                <td class="px-6 py-4 text-white whitespace-nowrap border-b border-b border-gray-300">
                    {{ $c->nomCours}}
                    </td>
                    <td class="px-6 py-4 text-white whitespace-pre-line border-b border-b border-gray-300">
                        {{ $c->tacheDescription}}
                </td>
                <td class="px-6 py-4 text-white whitespace-pre-line border-b border-b border-gray-300">
                    <a href="localhost:8000/{{ asset('upload') }}/ {{$c->name }}">
                {{ $c->name }}

            </a>
                </td>
                <td class="px-6 py-4 text-white whitespace-pre-line border-b border-gray-300">

                        <a href="{{ $c->tacheURL }}" target="_blank" rel="noopener noreferrer">{{Str::limit(htmlspecialchars_decode(strip_tags( $c->tacheURL)),30) }}</a>
                </td>


                <!-- Ajoutez plus de cellules pour chaque ligne de données -->
              </tr>
              @endforeach

              <!-- Ajoutez plus de lignes de données si nécessaire -->
            </tbody>
          </table>
        <div class="container mx-auto p-4">
            {{ $tacheStagiaires->links() }}
        </div>
        </div>
      </div>



@endsection

