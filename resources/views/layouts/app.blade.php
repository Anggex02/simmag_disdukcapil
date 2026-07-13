<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIMMAG Disdukcapil')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body class="bg-background text-white font-[Inter]">

<div class="min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="flex flex-1">

        {{-- Sidebar --}}
        @yield('sidebar')

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto p-6">

            @yield('content')

        </main>

    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</div>

@stack('scripts')

</body>

</html>