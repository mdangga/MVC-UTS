<header class="py-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="glass-effect rounded-3xl shadow-2xl p-3 relative overflow-hidden">
            <div class="relative z-10 grid grid-cols-6 items-center justify-between gap-6">
                <!-- Back Button -->
                <a href="{{ route('beranda') }}"
                    class="inline-flex mx-auto col-span-1 items-center px-6 py-3 rounded-2xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl bg-gradient-sage text-white">
                    <i class="fas fa-arrow-left mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Title -->
                <div class="text-center col-span-4 mx-0 md:mx-2">
                    <h1 class="text-3xl font-bold text-shadow text-terracotta">@yield('header_title')</h1>
                    <p class="text-md opacity-80 mt-2 text-terracotta">@yield('header_description')</p>
                </div>
            </div>
        </div>
    </div>
</header>
