<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GrafitexSgh V2') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"  rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>


        @livewireStyles

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
        {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>


    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- los pongo porque sino run dev me los quita en componentes livewire --}}
            <div class="bg-blue-500"></div>
            <div class="bg-green-500"></div>
            <div class="bg-yellow-500"></div>
            <div class="bg-gray-500"></div>
            <div class="bg-orange-500"></div>

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-2 mx-auto sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer>
            <div class="p-2 text-xs">powered by  <a href="mailto:alex.arregui@hotmail.es" class="text-blue-800 underline">alex.arregui@hotmail.es</a></div>
            <div class="w-11/12"></div> {{-- es por el npm runwatch --}}
        </footer>

        <x-notification />
        <x-notificationred />

        @stack('modals')

        @livewireScripts

                <!-- jQuery -->
                <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

                <!-- jQuery UI 1.11.4 -->
                <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

                <!-- Alpine 3.2.4 -->
                <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js" defer></script>



        @yield('script')
        @stack('scriptchosen')



    </body>
</html>
