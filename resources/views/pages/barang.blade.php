@extends('layouts.main')

@section('title', 'Daftar Barang')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Daftar Barang Kami</h1>
        @if ($barangs)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                @foreach ($barangs as $item)
                    <div
                        class="group bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-2xl hover:border-green-200 transform hover:-translate-y-2 transition-all duration-500">

                        <!-- Gambar placeholder -->
                        <div
                            class="h-48 bg-gradient-to-tr from-green-100 to-green-200 flex items-center justify-center text-green-700 text-4xl font-bold">
                            {{ strtoupper(substr($item['nama_barang'], 0, 1)) }}
                        </div>

                        <!-- Konten -->
                        <div class="p-6">
                            <h3
                                class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-green-600 transition-colors duration-300">
                                {{ $item['nama_barang'] }}
                            </h3>
                            <p class="text-gray-500 text-sm mb-4">
                                Stok: <span class="font-medium text-gray-700">{{ $item['stok'] }}</span>
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-green-600 text-lg font-bold">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </span>
                                <button
                                    class="relative bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-green-400">
                                    <span class="relative z-10">Beli</span>
                                    <span
                                        class="absolute inset-0 bg-green-500 rounded-xl opacity-0 group-hover:opacity-30 blur-sm transition duration-300">
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg">Belum ada barang yang tersedia.</p>
        @endif
    </div>
@endsection
