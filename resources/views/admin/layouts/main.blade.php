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

    <div x-data class="">
        <aside
            x-show="$store.layout.sidebar"
            class="sidebar fixed w-full h-full inset-0 overflow-hidden" style="display: none;z-index: 9999;"
        >
            <div
                x-show="$store.layout.sidebar"
                x-transition:enter="ease-in-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="$store.layout.closeSidebar()"
                style="display: none;"
                class="overlay fixed w-full h-full inset-0 bg-gray-900 bg-opacity-50 cursor-pointer"
            ></div>
            <div
                x-show="$store.layout.sidebar"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="content fixed w-full sm:w-96 h-full inset-0 bg-white"
                style="display: none;"
            >
                <div class="flex items-center px-6">
                    <div class="flex-grow">
                        <h1 class="text-lg font-semibold tracking-wide py-4">{{ __("Hotel Management") }}</h1>
                    </div>
                    <button @click="$store.layout.closeSidebar()" class="button py-4 w-8 h-8 relative bg-transparent border-transparent cursor-pointer">
                        <div class="absolute h-px w-full bg-gray-900 bg-opacity-50 left-0 top-1/2 transform translate-x-0 -translate-y-1/2 rotate-45"></div>
                        <div class="absolute h-full w-px bg-gray-900 bg-opacity-50 left-1/2 top-0 transform -translate-x-1/2 translate-y-0 rotate-45"></div>
                    </button>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <div class="flex items-center py-4 space-x-4">
                        <x-display.avatar class="w-16 h-16" src="https://via.placeholder.com/150" />
                        <div class="flex-grow">
                            <p>{{ __("John Doe") }}</p>
                            <p>{{ __("example@mail.com") }}</p>
                        </div>
                    </div>
                    <x-menu.menu class="space-y-1 divide-y">
                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-hotel text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                {{ __("Hotels") }}
                            </a>
                        </x-menu.item>
                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-user-shield text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                {{ __("Receptionist") }}
                            </a>
                        </x-menu.item>
                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-user-friends text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                {{ __("Guests") }}
                            </a>
                        </x-menu.item>
                    </x-menu.menu>
                </div>
            </div>
        </aside>

        <main>
            <header class="bg-white">
                <div class="flex items-center max-w-7xl mx-auto px-6 py-4 space-x-4">
                    <button @click="$store.layout.openSidebar()" type="button" class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                    <h1 class="flex-grow text-sm sm:text-lg font-semibold tracking-wide">{{ __("Hotel Management") }}</h1>
                    <div class="flex items-center space-x-4">
                        <button class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="hidden sm:inline">{{ __("Notifications") }}</span>
                        </button>
                        <button class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                            <i class="fas fa-inbox text-xl"></i>
                            <span class="hidden sm:inline">{{ __("Inbox") }}</span>
                        </button>
                        <div class="relative">
                            <button @click="$store.layout.openUserDropdown()" type="button" class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                                <x-display.avatar class="inline-block w-8 h-8" src="https://via.placeholder.com/150" />
                                <span class="hidden sm:inline">{{ __("Username") }}</span>
                            </button>
                            <x-menu.menu
                                @click.away="$store.layout.closeUserDropdown()"
                                x-show="$store.layout.userDropdown"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="w-64 px-4 py-2 absolute right-0 top-full z-50 space-y-1 border bg-white rounded-md shadow-md"
                                style="display: none;z-index: 1000;"
                            >
                                <x-menu.item class="group space-x-3">
                                    <i class="fas fa-hotel text-2xl text-gray-500 group-hover:text-gray-900"></i>
                                    <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                        {{ __("Hotels") }}
                                    </a>
                                </x-menu.item>
                                <x-menu.item class="group space-x-3">
                                    <i class="fas fa-user-shield text-2xl text-gray-500 group-hover:text-gray-900"></i>
                                    <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                        {{ __("Receptionist") }}
                                    </a>
                                </x-menu.item>
                                <x-menu.item class="group space-x-3">
                                    <i class="fas fa-user-friends text-2xl text-gray-500 group-hover:text-gray-900"></i>
                                    <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                        {{ __("Guests") }}
                                    </a>
                                </x-menu.item>

                                <hr />

                                <x-menu.item class="group space-x-3">
                                    <i class="fas fa-sign-out-alt text-2xl text-gray-500 group-hover:text-gray-900"></i>
                                    <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                        {{ __("Logout") }}
                                    </a>
                                </x-menu.item>
                            </x-menu.menu>
                        </div>
                    </div>
                </div>
            </header>
            <main>
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
