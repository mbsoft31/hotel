<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name") }} | {{ $title ?? '' }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    <link rel="stylesheet" href="{{ mix("css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("fonts/fontawesome-all.min.css") }}">

    @stack("styles")
    @livewireStyles
</head>
<body class="bg-gray-100">

    <div x-data>
        @livewire("layouts.sidebar")

        <main class="min-h-screen flex flex-col">
            @livewire("layouts.navbar")
            <main class="flex-grow min-h-full">
                @if(isset($header))
                    <div>
                        {{ $header }}
                    </div>
                @endif
                <div class="max-w-7xl mx-auto">
                    {{ $slot ?? '' }}
                </div>
            </main>
            <footer class="bg-white mt-6">
                <div class="flex items-center justify-center max-w-7xl mx-auto px-6 py-8 space-x-4">
                    <div>All right reserved &circledR; 2021</div>
                </div>
            </footer>
        </main>
    </div>

    <div id="modals">
        @stack("modals")
    </div>

    @livewireScripts
    <script src="{{ asset("js/app.js") }}"></script>
    @stack("scripts")
</body>
</html>
