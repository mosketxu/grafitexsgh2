<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-6 md:px-2">
        <div class="flex justify-between h-12">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    @can('dashboard.index')
                    <a href="{{ route('tienda.index') }}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>
                    @else
                        <x-jet-application-mark class="block w-auto h-9" />
                    @endcan
                </div>

                <!-- Navigation Links -->
                @can('tiendas.index')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        @if(Auth::user()->hasRole('tienda'))
                        <x-jet-nav-link href="{{route('tienda.recepcion') }}" :active="request()->routeIs('tienda.recepcion')">
                            {{ __('Control recepción') }}
                        </x-jet-nav-link>
                        @else
                        <x-jet-nav-link href="{{route('tienda.control') }}" :active="request()->routeIs('tienda.control')">
                            {{ __('Control recepción') }}
                        </x-jet-nav-link>
                        @endif
                    </div>
                @endcan
                @can('peticion.index')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link  href="{{route('peticion.index') }}" :active="request()->routeIs('peticion.index')">
                            {{ __('Peticiones') }}
                        </x-jet-nav-link>
                    </div>
                @endcan
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-jet-dropdown-link
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log Out') }}
                            </x-jet-dropdown-link>

                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @can('tiendas.index')
                @if(Auth::user()->hasRole('tienda'))
                    <x-jet-responsive-nav-link href="{{ route('tienda.recepcion') }}" :active="request()->routeIs('tiendas.recepcion')">
                        {{ __('Control recepción') }}
                    </x-jet-responsive-nav-link>
                @else
                    <x-jet-responsive-nav-link href="{{ route('tienda.control') }}" :active="request()->routeIs('tiendas.control')">
                        {{ __('Control recepción') }}
                    </x-jet-responsive-nav-link>
                @endif
            @endcan
            @can('peticion.index')
                <x-jet-responsive-nav-link href="{{ route('peticion.index') }}" :active="request()->routeIs('peticion.index')">
                    {{ __('Peticiones') }}
                </x-jet-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
