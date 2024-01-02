<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-4">
                            <!-- Bouton "Ajouter un module" -->
                            <a class="btn btn-primary" href="{{ route('module.create') }}">
                                <i class="fas fa-plus"></i> Ajouter un module
                            </a>
                        </div>
                        <table id="moduleTable"  class="table table-dark table-striped p-3">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-3">
                                        Module Name
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-3">
                                        Description
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-3">
                                        Domaine
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-3">
                                        Image
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider p-3">
                                        Options
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-200 dark:bg-gray-700 divide-y divide-gray-300 dark:divide-gray-600">
                                @foreach ($module as $module)
                                <tr>
                                    <td class="px-6 py-4 p-3 text-xs">
                                        {{ $module->nomModule }}
                                    </td>
                                    <td class="px-6 py-4 p-3 text-xs">
                                        {{ Str::limit(htmlspecialchars_decode(strip_tags($module->description)), 30) }}
                                    </td>
                                   
                                    <td class="px-6 py-4 p-3 text-xs">
                                        {{ $module->domaine->nomDomaine }}
                                    </td>
                                    <td class="px-6 py-4 p-3">
                                        <img src="{{ asset('images/'.$module->image) }}" alt="Image" class="w-12 h-12 object-cover rounded-full">
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                      
                                        <a class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1 px-2 rounded m-1" href="{{ route('module.update', $module->id) }}">
                                        <i class="fas fa-edit ml-1"></i> Éditer
                                        </a>
                                        <a class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1 px-2 rounded m-1"  href="{{ route('module.delete', $module->id) }}">
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
        });
    });
</script>

</x-app-layout>
