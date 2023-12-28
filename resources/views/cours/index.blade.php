<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <!-- Bouton "Ajouter un cours" en haut à droite -->
                        <a class="btn btn-primary" href="{{ route('cours.create') }}">
                            <i class="fas fa-plus"></i> Ajouter un cours
                        </a>
                    </div>
                    <table id="coursTable" class="table table-dark table-striped p-3">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nom Cours
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Ressource
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nom Module
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Options
                                </th>
                                <!-- Ajoutez plus d'en-têtes de colonnes si nécessaire -->
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 dark:bg-gray-700 divide-y divide-gray-300 dark:divide-gray-600">
                            @foreach ($cour as $cour)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">
                                    {{ $cour->nomCours }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">
                                    {{ strlen($cour->description) > 30 ? substr($cour->description, 0, 30) . '...' : $cour->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">
                                    <a href="{{ $cour->ressource }}" target="_blank">
                                        {{ strlen($cour->ressource) > 30 ? substr($cour->ressource, 0, 30) . '...' : $cour->ressource }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">
                                    {{ strlen($cour->module->nomModule) > 30 ? substr($cour->module->nomModule, 0, 30) . '...' : $cour->module->nomModule }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs">
                                    <a class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1 px-2 rounded m-1" href="{{ route('cours.update', $cour->id) }}">
                                    <i class="fas fa-edit"></i> Éditer
                                    </a>
                                    <a class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1 px-2 rounded m-1" href="{{ route('cours.delete', $cour->id) }}">
                                    <i class="fas fa-trash ml-1"></i> Supprimer
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

    <!-- Ajoutez ce script après votre champ de recherche -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            // Filtrer la table des domaines
            $("#domaineTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

            // Filtrer la table des modules
            $("#moduleTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

            // Filtrer la table des cours
            $("#coursTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</x-app-layout>
