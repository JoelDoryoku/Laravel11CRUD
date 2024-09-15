<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/alertify.min.js') }}"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl my-0 mx-auto">
                    <main class="mt-6 text-black">
                        <div class="flex justify-between">
                            <h2 class="font-bold text-2xl">@yield('view:name')</h2>
                            <a href="@yield('view:route')" class="text-sm bg-[#007364] text-white py-2 px-3 rounded-md">@yield('view:link-name')</a>
                        </div>

                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
