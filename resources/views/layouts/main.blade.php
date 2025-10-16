<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    @yield('head_scripts')
</head>

<body class="flex flex-col min-h-screen font-sans antialiased">

    {{-- Header --}}
    @include('partials.nav')

    {{-- Main Content --}}
    <main class="flex-1 w-full max-w-6xl mx-auto px-5 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Body Scripts --}}
    @yield('body_scripts')
</body>

</html>
