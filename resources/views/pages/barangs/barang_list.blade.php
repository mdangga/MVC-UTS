@extends('layouts.main')

@section('title', 'Daftar Barang')


@section('content')
@section('header_title', 'Daftar Barang')
@section('header_description', 'Kelola Inventaris Anda')
<x-search-komponen route="barang.index" placeholder="Cari barang, kategori, pemasok..." />

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6">
    @if ($barangs->count())
        <!-- Add New Item Card -->
        <div
            class="flex justify-center items-center card-hover glass-effect rounded-2xl shadow-lg border-2 border-dashed border-sage-green">
            <div class="p-4 text-center">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl mb-3 shadow-md bg-gradient-sage">
                    <i class="fas fa-plus text-lg text-white"></i>
                </div>
                <h3 class="text-lg font-bold mb-2 text-terracotta">Tambah Barang Baru</h3>
                <p class="text-sm opacity-80 mb-4 text-terracotta">Tambahkan barang ke inventaris</p>
                <a href="{{ route('barang.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>

        <!-- Item Cards -->
        @foreach ($barangs as $barang)
            <div class="item card-hover glass-effect rounded-2xl shadow-lg overflow-hidden">
                <!-- Item Header -->
                <div class="p-3 relative bg-gradient-terracotta">
                    <div
                        class="absolute top-2 right-2 px-2 py-1 rounded-lg text-xs font-bold shadow-md bg-cream text-terracotta">
                        ID: {{ $loop->iteration + ($barangs->currentPage() - 1) * $barangs->perPage() }}
                    </div>
                    <div class="pr-12">
                        <h3 class="text-base font-bold text-white mb-1 truncate">
                            {{ $barang->nama_barang }}
                        </h3>
                        <div
                            class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-warm-beige text-terracotta">
                            <i class="fas fa-tag mr-1 text-xs"></i>
                            {{ $barang->kategori->nama_kategori }}
                        </div>
                    </div>
                </div>

                <!-- Item Body -->
                <div class="p-3 space-y-3">
                    <!-- Stok Section -->
                    <div class="flex items-center justify-between p-2 rounded-xl bg-warm-beige">
                        <div>
                            <p class="text-xs font-medium opacity-80 text-terracotta">Stok</p>
                            <p class="text-lg font-bold text-terracotta">{{ $barang->stok }}</p>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="text-center p-2 rounded-xl bg-cream">
                        <div>
                            <p class="text-xs font-medium opacity-80 text-terracotta">Pemasok</p>
                            <p class="text-sm font-bold text-terracotta truncate">
                                {{ $barang->pemasok->nama_pemasok }}</p>
                        </div>
                    </div>
                </div>

                <!-- Item Footer -->
                <div class="p-3 text-center bg-warm-beige">
                    <a href="{{ route('barang.show', $barang->id_barang) }} "
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                        <span>Detail</span>
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <!-- Empty State -->
        <div class="col-span-full">
            <div class="glass-effect rounded-2xl shadow-lg p-8 text-center">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-6 shadow-lg bg-linear-to-br from-warm-beige to-cream">
                    <i class="fas fa-box-open text-3xl text-terracotta"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-terracotta">
                    Belum Ada Barang
                </h3>
                <p class="text-lg opacity-80 mb-6 text-terracotta">
                    Inventaris Anda masih kosong. Tambahkan barang pertama sekarang!
                </p>
                <a href="{{ route('barang.create') }}"
                    class="inline-flex items-center px-6 py-3 font-semibold rounded-2xl shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                    <i class="fas fa-plus mr-3"></i>
                    <span>Tambah Barang</span>
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Pagination -->
<div class="mt-6">
    {!! $barangs->appends(request()->except('page'))->links() !!}
</div>
@endsection
