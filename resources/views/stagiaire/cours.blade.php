@extends('stagiaire.leftmenu')
@section('content')



<div class=" mt-20 mb-4 ml-4"> <span class="text-2xl  bg-gray-700 text-white font-semibold py-2 px-4 rounded-3xl">Les cours du module {{ $modules->nomModule}} </span></div>

<div class=" flex container mx-auto justify-center bg-gray-700   rounded-3xl">

    <div class="container mx-auto p-4">


          <!--gregregr Carte du module 1 -->
          <div class="container mx-auto p-4">
            <div class="container mt-5 mb-3">
              <h2>Progression des cours</h2>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: {{ $pourcentageProgression }}%;" aria-valuenow="{{ $pourcentageProgression }}" aria-valuemin="0" aria-valuemax="100">{{ $pourcentageProgression }}%</div>
              </div>
          </div>

          <table class="min-w-full">
            <thead>
              <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                 Cour
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                ressources
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                description
                 </th>
                 <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    envoie fichier
                    </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                 Etat
                </th>
              </tr>
            </thead>

            <tbody>
              @if ($cours->count() == 0)

              <td class="px-6 py-4 text-center text-3xl font-bold text-whith uppercase tracking-wider border-gray-300">
                Aucun cours disponible sur ce module pour le moment
              </td>

          @endif
              @foreach ($cours as $c)


              <tr>
                <td class="px-6 py-4 text-white whitespace-nowrap border-b border-gray-300">
                {{ $c->nomCours}}
                </td>
                <td class="px-6 py-4 text-white  whitespace-pre-line  border-b border-gray-300">
                    <a href="{{ $c->ressource }}" target="_blank">
                {{ $c->ressource }}

            </a>
                </td>
                <td class="px-6 py-4 text-white whitespace-pre-line  border-b border-gray-300">
                  {{ $c->description }}

                </td>

                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                  <a class="bg-indigo-600 hover:bg-indigo-600  text-gray-400 hover:text-white font-bold py-2 px-4 rounded m-2" href="{{ route("stagiaires.gettache",$c->id) }}">
                    <i class="fas fa-upload ml-1"></i>

                  </a>

                  </td>
                  <td class="px-6 py-4 text-white whitespace-nowrap border-b border-gray-300">
    <form action="{{ route('update.etat', $c->id) }}" method="post">
        @csrf
        @method('patch') <!-- Utilisez la méthode PATCH pour une mise à jour -->

        <button type="submit" class="bg-{{ $c->etat === 'terminé' ? 'green' : 'yellow' }}-500 hover:bg-{{ $c->etat === 'terminé' ? 'green' : 'yellow' }}-700 text-white font-bold py-2 px-4 rounded">
            {{ $c->etat }}
        </button>
    </form>
</td>                <!-- Ajoutez plus de cellules pour chaque ligne de données -->
              </tr>
              @endforeach

              <!-- Ajoutez plus de lignes de données si nécessaire -->
            </tbody>
          </table>

        </div>
      </div>



@endsection

