@extends('layouts.main')

@section('title', 'Daftar Barang')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Daftar Barang Kami</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @php
            $products = [
                ['title' => 'Smartphone Pro X', 'desc' => 'Smartphone flagship dengan kamera 108MP dan chipset terbaru.', 'price' => 'Rp 5.999.000', 'gradient' => 'from-indigo-500 to-purple-600'],
                ['title' => 'Laptop Ultra Slim', 'desc' => 'Laptop tipis dan ringan, ideal untuk mobilitas tinggi.', 'price' => 'Rp 8.500.000', 'gradient' => 'from-pink-400 to-red-500'],
                ['title' => 'Headphone Wireless', 'desc' => 'Suara jernih dengan noise cancelling dan baterai 30 jam.', 'price' => 'Rp 1.299.000', 'gradient' => 'from-sky-400 to-cyan-400'],
                ['title' => 'Smartwatch Elite', 'desc' => 'Monitor kesehatan lengkap dengan GPS dan tahan air.', 'price' => 'Rp 2.499.000', 'gradient' => 'from-pink-500 to-yellow-400'],
                ['title' => 'Kamera Mirrorless', 'desc' => 'Kamera profesional 24MP dengan video 4K 60fps.', 'price' => 'Rp 12.500.000', 'gradient' => 'from-teal-400 to-indigo-800'],
                ['title' => 'Mouse Gaming RGB', 'desc' => 'DPI tinggi dengan RGB lighting, cocok untuk gaming.', 'price' => 'Rp 450.000', 'gradient' => 'from-emerald-200 to-pink-200'],
            ];
        @endphp

        @foreach ($products as $item)
        <div
            class="group bg-white rounded-2xl shadow-md overflow-hidden transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-500 relative">
            <!-- Konten -->
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-green-600 transition-colors duration-300">
                    {{ $item['title'] }}
                </h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    {{ $item['desc'] }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-green-600 text-lg font-bold">{{ $item['price'] }}</span>
                    <button
                        class="relative bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <span class="relative z-10">Beli</span>
                        <span
                            class="absolute inset-0 bg-green-500 rounded-lg opacity-0 group-hover:opacity-40 blur-md transition duration-300"></span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
