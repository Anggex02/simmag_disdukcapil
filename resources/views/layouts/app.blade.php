<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIMMAG Disdukcapil')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-white">

    <div class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        @include('layouts.navbar')

        <div class="flex flex-1">

            {{-- Sidebar --}}
            @yield('sidebar')

            {{-- Content --}}
            <main class="flex-1 p-6 overflow-auto">

                @yield('content')

            </main>

        </div>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

</body>

</html>