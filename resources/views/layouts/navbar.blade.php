<header class="bg-white border-b border-gray-100">
    <div class="flex items-center max-w-7xl mx-auto px-6 py-6 space-x-4">
        @auth
            <button @click="$store.layout.openSidebar()" type="button" class="inline-flex items-center space-x-2 text-center text-purple-500 hover:text-purple-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        @endauth
        <h1 class="flex-grow text-sm sm:text-lg font-semibold tracking-wide text-purple-600">
            <a href="/">{{ config("app.name", __("Hotel Management")) }}</a>
        </h1>
        <div class="flex items-center space-x-4">
            @auth
                <button class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="hidden sm:inline">{{ __("Notifications") }}</span>
                </button>
                <button class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                    <i class="fas fa-inbox text-xl"></i>
                    <span class="hidden sm:inline">{{ __("Inbox") }}</span>
                </button>
                <div class="inline-flex items-center relative">
                    <button @click="$store.layout.openUserDropdown()" type="button" class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                        <x-display.avatar class="inline-block w-6 h-6" src="https://via.placeholder.com/150" />
                        <span class="hidden sm:inline">{{ Auth::user()->full_name }}</span>
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
                        class="w-64 mt-4 px-4 py-2 absolute right-0 top-full z-50 space-y-1 border bg-white rounded-md shadow-md"
                        style="display: none;z-index: 1000;"
                    >

                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-user-alt text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <a href="{{ route("profile") }}" class="flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                {{ __("Profile") }}
                            </a>
                        </x-menu.item>

                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-plus-circle text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <a href="{{ route("dashboard") }}" class="flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                {{ __("Account") }}
                            </a>
                        </x-menu.item>

                        <hr />

                        <x-menu.item class="group space-x-3">
                            <i class="fas fa-sign-out-alt text-2xl text-gray-500 group-hover:text-gray-900"></i>
                            <form action="{{ route("logout") }}" method="POST" class="flex-grow">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                                    {{ __("Logout") }}
                                </button>
                            </form>
                        </x-menu.item>
                    </x-menu.menu>
                </div>
            @endauth

            @guest
                    <a href="{{ route("login") }}" class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                        <i class="fas fa-user-alt"></i><span>{{ __("Login") }}</span>
                    </a>
                    <a href="{{ route("register") }}" class="inline-flex items-center space-x-2 text-center text-gray-500 hover:text-gray-700">
                        <i class="fas fa-user-plus"></i><span>{{ __("Create an account") }}</span>
                    </a>
            @endguest
        </div>
    </div>
</header>
