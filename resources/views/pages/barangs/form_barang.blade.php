@extends('layouts.main')

@php $isEdit = isset($barang); @endphp

@section('title', $isEdit ? 'Edit Barang' : 'Tambah Barang')

@section('content')
@section('header_title', $isEdit ? 'Edit Barang' : 'Tambah Barang')
@section('header_description',
    $isEdit
    ? 'Perbarui informasi barang Anda'
    : 'Masukkan informasi barang baru
    Anda')
    <div class="bg-gradient-custom flex ">
        <div class="w-full max-w-7xl">
            <!-- Form Container -->
            <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
                <!-- Form Header -->
                <div class="bg-warm-beige p-8 border-b border-cream">
                    <div class="flex items-center">
                        <div
                            class="w-16 h-16 bg-gradient-terracotta rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                            <i class="fas fa-plus text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-terracotta">Informasi Barang</h2>
                            <p class="text-terracotta opacity-80 text-lg">Lengkapi semua field yang diperlukan</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ $isEdit ? route('barang.update', $barang->id_barang) : route('barang.store') }}"
                        method="POST" class="space-y-8">
                        @csrf
                        @if ($isEdit)
                            @method('PATCH')
                        @endif
                        <!-- Nama Barang -->
                        <div class="form-group">
                            <label for="nama_barang" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                <i class="fas fa-tag text-sage-green mr-3 text-xl"></i>
                                Nama Barang
                                <span class="text-red-500 ml-2 text-xl">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="nama_barang" name="nama_barang"
                                    value="{{ old('nama_barang', $barang->nama_barang ?? '') }}"
                                    placeholder="Masukkan nama barang"
                                    class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta placeholder-terracotta placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                    <i class="fas fa-box text-xl"></i>
                                </div>
                            </div>
                            @error('nama_barang')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Grid untuk Stok dan Harga -->
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Stok -->
                            <div class="form-group">
                                <label for="stok" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                    <i class="fas fa-cubes text-sage-green mr-3 text-xl"></i>
                                    Stok
                                    <span class="text-red-500 ml-2 text-xl">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" id="stok" name="stok" min="0"
                                        value="{{ old('stok', $barang->stok ?? '') }}" placeholder="0"
                                        class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                    <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                        <i class="fas fa-hashtag text-xl"></i>
                                    </div>
                                </div>
                                @error('stok')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="form-group">
                                <label for="harga" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                    <i class="fas fa-money-bill-wave text-sage-green mr-3 text-xl"></i>
                                    Harga
                                    <span class="text-red-500 ml-2 text-xl">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" id="harga" name="harga" min="0" step="100"
                                        value="{{ old('harga', $barang->harga ?? '') }}" placeholder="0"
                                        class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                    <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                        <span class="text-lg font-bold">Rp</span>
                                    </div>
                                </div>
                                @error('harga')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Grid untuk Kategori dan Pemasok -->
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="form-group">
                                <label for="id_kategori" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                    <i class="fas fa-layer-group text-sage-green mr-3 text-xl"></i>
                                    Kategori
                                    <span class="text-red-500 ml-2 text-xl">*</span>
                                </label>
                                <div class="relative">
                                    <select id="id_kategori" name="id_kategori"
                                        class="w-full px-6 py-4 pl-16 pr-12 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta
                       focus:ring-2 focus:ring-sage-green focus:border-sage-green appearance-none">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id_kategori }}"
                                                {{ old('id_kategori', $barang->id_kategori ?? '') == $kategori->id_kategori ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute left-6 top-1/2 -translate-y-1/2 text-sage-green pointer-events-none">
                                        <i class="fas fa-list text-xl"></i>
                                    </div>
                                </div>
                                @error('id_kategori')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_pemasok" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                    <i class="fas fa-truck text-sage-green mr-3 text-xl"></i>
                                    Pemasok
                                    <span class="text-red-500 ml-2 text-xl">*</span>
                                </label>
                                <div class="relative">
                                    <select id="id_pemasok" name="id_pemasok"
                                        class="w-full px-6 py-4 pl-16 pr-12 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta
                       focus:ring-2 focus:ring-sage-green focus:border-sage-green appearance-none">
                                        <option value="">Pilih Pemasok</option>
                                        @foreach ($pemasoks as $pemasok)
                                            <option value="{{ $pemasok->id_pemasok }}"
                                                {{ old('id_pemasok', $barang->id_pemasok ?? '') == $pemasok->id_pemasok ? 'selected' : '' }}>
                                                {{ $pemasok->nama_pemasok }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div
                                        class="absolute left-6 top-1/2 -translate-y-1/2 text-sage-green pointer-events-none">
                                        <i class="fas fa-building text-xl"></i>
                                    </div>
                                </div>
                                @error('id_pemasok')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-6 pt-8 border-t-2 border-warm-beige">
                            <a href="{{ $isEdit ? route('barang.show', $barang->id_barang) : route('barang.index') }}"
                                class="flex items-center justify-center px-8 py-4 bg-warm-brown text-white font-bold text-lg rounded-2xl shadow-lg order-2 sm:order-1 transition-all duration-300 hover:scale-105 active:scale-95">
                                <i class="fas fa-arrow-left mr-3"></i>
                                Kembali
                            </a>

                            <button type="submit"
                                class="flex items-center justify-center px-8 py-4 bg-gradient-sage text-white font-bold text-lg rounded-2xl shadow-lg flex-1 order-1 sm:order-2 transition-all duration-300 hover:scale-105 active:scale-95">
                                <i class="fas fa-save mr-3"></i>
                                Simpan Barang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
