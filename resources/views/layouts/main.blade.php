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

    <!-- Header -->
    <header class="bg-gradient-to-r from-gray-900 via-gray-800 to-green-800 text-white shadow-lg">
        <nav class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="bg-green-500 text-white rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" class="h-6 w-6" viewBox="0 0 512 512">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M468.915 401.333q.345 1.631.406 3.295l.013.706v21.333c0 23.564-42.981 42.667-96 42.667c-52.49 0-95.14-18.723-95.987-41.961l-.013-.706v-21.333l.013-.706q.06-1.66.402-3.288c5.88 4.419 13.037 8.494 21.331 11.983c19.36 8.144 45.463 13.344 74.254 13.344c29.932 0 56.956-5.629 76.546-14.335c7.323-3.255 13.697-6.982 19.035-10.999M234.667 34.347l192 106.667l.001 78.722c-15.727-4.038-33.92-6.402-53.334-6.402c-29.239 0-55.704 5.375-75.228 14.052c-26.733 11.882-40.343 30.052-42.063 48.441l-.049.557l.122 172.713l-21.449 11.917l-192-106.667V141.014zm234.248 302.986q.345 1.631.406 3.295l.013.706v21.333c0 23.564-42.981 42.667-96 42.667c-52.49 0-95.14-18.723-95.987-41.961l-.013-.706v-21.333l.013-.706q.06-1.66.402-3.288c5.88 4.419 13.037 8.494 21.331 11.983c19.36 8.144 45.463 13.344 74.254 13.344c29.932 0 56.956-5.629 76.546-14.335c7.323-3.255 13.697-6.982 19.035-10.999M170.666 233.455l.001 144.598l42.667 23.704V257.158zm-85.332-47.406v144.594L128 354.348V209.752zm288 48.618c52.489 0 95.14 18.722 95.987 41.961l.013.706v21.333c0 23.564-42.981 42.667-96 42.667c-52.49 0-95.14-18.723-95.987-41.961l-.013-.706v-21.333l.142-2.341c2.734-22.476 44.606-40.326 95.858-40.326m-54.676-106.251l-125.579 70.086l41.588 23.104l125.867-69.926zm-83.991-46.662L108.8 151.68l41.662 23.146L276.04 104.74z" />
                    </svg>
                </div>
                <span class="text-xl font-semibold tracking-wide">lorem</span>
            </div>

            <!-- Menu -->
            <ul class="hidden md:flex items-center gap-4 text-base font-medium">
                <li>
                    <a href="{{ route('beranda') }}"
                        class="px-4 py-2 rounded-full transition-all duration-300
                        {{ Route::is('beranda')
                            ? 'bg-green-500 text-white shadow-md cursor-pointer'
                            : 'hover:bg-green-600 hover:text-white bg-transparent' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="px-4 py-2 rounded-full transition-all duration-300
                        {{ Route::is('about')
                            ? 'bg-green-500 text-white shadow-md cursor-pointer'
                            : 'hover:bg-green-600 hover:text-white bg-transparent' }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('barang') }}"
                        class="px-4 py-2 rounded-full transition-all duration-300
                        {{ Route::is('barang')
                            ? 'bg-green-500 text-white shadow-md cursor-pointer'
                            : 'hover:bg-green-600 hover:text-white bg-transparent' }}">
                        Barang
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-6xl mx-auto px-5 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p>&copy; 2025 Aplikasi Saya. Semua hak dilindungi.</p>
    </footer>

    @yield('body_scripts')
</body>

</html>
