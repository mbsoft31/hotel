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
        <div class="">
            <div class="px-6 py-4 pt-10 space-y-4 bg-gray-50 shadow-sm border-b">
                @auth
                    <div class="flex items-center py-4 space-x-4">
                        <x-display.avatar class="w-20 h-20" src="https://via.placeholder.com/150" />
                        <div class="flex-grow">
                            @role("receptionist")
                            {{ Auth::user()->receptionist->name }}
                            @endrole
                            <p class="text-sm font-semibold tracking-wider text-gray-700">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                @endauth
            </div>
            <div class="px-6 py-4 space-y-4">
                @role("admin")
                    @include("layouts.admin-nav-menu")
                @endrole

                @role("receptionist")
                @include("layouts.receptionist-nav-menu")
                @endrole

                @role("guest")
                @include("layouts.guest-nav-menu")
                @endrole
            </div>
        </div>
    </div>
</aside>
