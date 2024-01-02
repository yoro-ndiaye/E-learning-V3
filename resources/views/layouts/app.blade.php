<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Defarsci') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
       
        .header1 {
            
            width: 100%;
            background-color: #f7f8fa;
            font-family: 'Proxima Nova', sans-serif;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header1 h1 {
            margin: 0;
            padding: 0;
            color: #63646f;
            font-family: cooper;
            padding-left: 40px;
        }

        .search-container {
    display: flex;
    align-items: center;
}

.search-container input[type="text"] {
    padding: 5px;
    text-align: center;
    border: 1px solid #ced4da;
    border-radius: 15px 0 0 15px;  /* Arrondi à gauche */
}

.search-container button {
    background-color: #343a40;
    color: #fff;
    border: none;
    font-weight: bold;
    padding: 5px 10px;
    border: 1px solid #ced4da;
    border-left: none;
    border-radius: 0 15px 15px 0;  /* Arrondi à droite */
    cursor: pointer;
}

    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    
    <!-- filtre pour recherche stagiare -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tableBody = document.getElementById('tableBody');
        var rows = tableBody.getElementsByClassName('table-row');
        var searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function () {
            var searchTerm = searchInput.value.toLowerCase();

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var shouldDisplay = false;

                for (var j = 0; j < cells.length; j++) {
                    var cellText = cells[j].innerText.toLowerCase();

                    if (cellText.includes(searchTerm)) {
                        shouldDisplay = true;
                        break;
                    }
                }

                rows[i].style.display = shouldDisplay ? '' : 'none';
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>
</html>