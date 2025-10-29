@extends('layouts.main')

@php $isEdit = isset($pemasok); @endphp

@section('title', $isEdit ? 'Edit Pemasok' : 'Tambah Pemasok')
@section('header_title', $isEdit ? 'Edit Pemasok' : 'Tambah Pemasok')
@section('header_description', $isEdit ? 'Perbarui data pemasok Anda' : 'Masukkan informasi pemasok baru')

@section('content')
    <div class="bg-gradient-custom flex ">
        <div class="w-full max-w-7xl">
            <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="bg-warm-beige p-8 border-b border-cream flex items-center">
                    <div
                        class="w-16 h-16 bg-gradient-terracotta rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-terracotta">
                            {{ $isEdit ? 'Edit Pemasok' : 'Tambah Pemasok' }}
                        </h2>
                        <p class="text-terracotta opacity-80 text-lg">Lengkapi semua field yang diperlukan</p>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-8">
                    <form action="{{ $isEdit ? route('pemasok.update', $pemasok->id_pemasok) : route('pemasok.store') }}"
                        method="POST" class="space-y-8">
                        @csrf
                        @if ($isEdit)
                            @method('PATCH')
                        @endif

                        <!-- Nama Pemasok -->
                        <div class="form-group">
                            <label for="nama_pemasok" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                <i class="fas fa-user-tie text-sage-green mr-3 text-xl"></i>
                                Nama Pemasok <span class="text-red-500 ml-2">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="nama_pemasok" name="nama_pemasok"
                                    value="{{ old('nama_pemasok', $pemasok->nama_pemasok ?? '') }}"
                                    placeholder="Masukkan nama pemasok"
                                    class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream
                                          text-lg font-medium text-terracotta placeholder-terracotta
                                          focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                    <i class="fas fa-building text-xl"></i>
                                </div>
                            </div>
                            @error('nama_pemasok')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                <i class="fas fa-map-marker-alt text-sage-green mr-3 text-xl"></i>
                                Alamat <span class="text-red-500 ml-2">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pemasok"
                                    class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream
                                             text-lg font-medium text-terracotta placeholder-terracotta
                                             focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">{{ old('alamat', $pemasok->alamat ?? '') }}</textarea>
                                <div class="absolute left-6 top-6 text-sage-green">
                                    <i class="fas fa-home text-xl"></i>
                                </div>
                            </div>
                            @error('alamat')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kontak -->
                        <div class="form-group">
                            <label for="kontak" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                <i class="fas fa-phone-alt text-sage-green mr-3 text-xl"></i>
                                Kontak <span class="text-red-500 ml-2">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="kontak" name="kontak"
                                    value="{{ old('kontak', $pemasok->kontak ?? '') }}"
                                    placeholder="Contoh: 081234567890 atau 0361123456"
                                    class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream
                                          text-lg font-medium text-terracotta placeholder-terracotta
                                          focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                    <i class="fas fa-phone text-xl"></i>
                                </div>
                            </div>
                            @error('kontak')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="flex flex-col sm:flex-row gap-6 pt-8 border-t-2 border-warm-beige">
                            <a href="{{ route('pemasok.index') }}"
                                class="flex items-center justify-center px-8 py-4 bg-warm-brown text-white font-bold text-lg rounded-2xl shadow-lg transition-all hover:scale-105 active:scale-95">
                                <i class="fas fa-arrow-left mr-3"></i> Kembali
                            </a>

                            <button type="submit"
                                class="flex items-center justify-center px-8 py-4 bg-gradient-sage text-white font-bold text-lg rounded-2xl shadow-lg flex-1 transition-all hover:scale-105 active:scale-95">
                                <i class="fas fa-save mr-3"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
