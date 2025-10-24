<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sage-green': '#A8BBA3',
                        'cream': '#F7F4EA',
                        'warm-beige': '#EBD9D1',
                        'terracotta': '#B87C4C',
                        'sage-dark': '#8FA085',
                        'terracotta-dark': '#A56840',
                        'warm-brown': '#9B8B6B',
                    },
                    backgroundImage: {
                        'gradient-custom': 'linear-gradient(135deg, #F7F4EA 0%, #EBD9D1 100%)',
                        'gradient-sage': 'linear-gradient(135deg, #A8BBA3, #8FA085)',
                        'gradient-terracotta': 'linear-gradient(135deg, #B87C4C, #A56840)',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(168, 187, 163, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .select-custom {
            background-position: right 8px center;
            background-repeat: no-repeat;
            background-size: 16px;
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    @yield('head_scripts')
</head>

<body class="bg-gradient-custom min-h-screen">

    <!-- Toast Notification -->
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition class="fixed top-6 right-6 z-50">
        @if (session('success'))
            <div class="bg-green-500 text-white px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="bg-red-500 text-white px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-xl"></i>
                <span class="font-semibold">{{ session('error') }}</span>
            </div>
        @endif
    </div>

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main class="max-w-7xl mx-auto px-6 pb-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Body Scripts --}}
    @yield('body_scripts')
</body>

</html>
