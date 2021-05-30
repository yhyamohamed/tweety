<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tweety') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body >
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100"> {{--all screen arch --}}
            @livewire('navigation-menu')

         {{--3 col arch --}}
            <div class="py-5 px-8 mx-6">
                <div class="flex justify-between">
                        <div class="w-32 ml-6">{{-- 1 --}}
                            @include('layouts._sidbar-links')
                        </div>
                    <div class="flex-1 mx-10" style="max-width: 700px">{{-- 2 --}}
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                    <div class="w-1/6">{{-- 3 --}}
                        @include('layouts._friends-list')
                    </div>
                </div>
            </div>
        {{--end 3 col arch --}}
        </div>{{--end of all screen arch --}}

        @stack('modals')

        @livewireScripts
    </body>
</html>
