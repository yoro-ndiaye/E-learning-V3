@php
if (!function_exists('truncateWords')) {
function truncateWords($text, $maxWords) {
$words = explode(' ', $text);
$truncatedWords = array_slice($words, 0, $maxWords);
return implode(' ', $truncatedWords);
}
}
@endphp

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
          <div class="container mx-auto overflow-x-auto">
            <div class="flex justify-between items-center mb-4">
              <!-- Bouton "Ajouter" en haut à droite -->
              <a class="bg-indigo-600 hover:bg-indigo-600 text-white hover:text-white font-bold py-2 px-4 rounded" href="{{ route('domaines.create') }}">
              <i class="fas fa-plus"></i> Ajouter un domaine
              </a>
            </div>
            <div class="min-w-full overflow-x-auto">
              <table id="domaineTable" class="table table-dark table-striped p-3">
                <thead>
                  <tr>
                    <th class="px-6 py-3 md:whitespace-nowrap max-w-xs md:max-w-full border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-5">
                      Domaine Name
                    </th>
                    <th class="px-6 py-3 md:whitespace-nowrap overflow-hidden max-w-xs md:max-w-full border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-5">
                      Description
                    </th>
                    <th class="px-6 py-3 md:whitespace-nowrap border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-5">
                      Option
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($domaine as $domaine)
                  <tr>
                    <td class="px-6 py-4 md:whitespace-nowrap text-xs max-w-xs md:max-w-full border-b border-gray-300 p-5">
                      {{ $domaine->nomDomaine }}
                    </td>
                    <td class="px-6 py-4 md:whitespace-nowrap text-xs overflow-hidden max-w-xs md:max-w-full border-b border-gray-300 p-5">
                      {{ truncateWords($domaine->description, 5) }}
                    </td>
                    <td class="px-6 py-4 md:whitespace-nowrap text-xs border-b border-gray-300">
                      <a class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1 px-2 rounded m-1"  href="{{ route('domaines.update',$domaine->id) }}">
                      <i class="fas fa-edit ml-1"></i> Éditer
                      </a>
                      <a class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1 px-2 rounded m-1"  href="{{ route('domaines.delete',$domaine->id) }}">
                      <i class="fas fa-trash ml-1"></i> Supprimer
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- filtre pour recherche domaine -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#domaineTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


</x-app-layout>