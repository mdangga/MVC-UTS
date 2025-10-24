@extends('layouts.main')

@php $isEdit = isset($kategori); @endphp

@section('title', $isEdit ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
@section('header_title', $isEdit ? 'Edit Kategori' : 'Tambah Kategori')
@section('header_description', $isEdit ? 'Perbarui informasi kategori Anda' : 'Masukkan informasi kategori baru Anda')
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
                            <h2 class="text-2xl font-bold text-terracotta">Informasi Kategori</h2>
                            <p class="text-terracotta opacity-80 text-lg">Lengkapi semua field yang diperlukan</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ $isEdit ? route('kategori.update', $kategori->id_kategori) : route('kategori.store') }}"
                        method="POST" class="space-y-8">
                        @csrf
                        @if ($isEdit)
                            @method('PATCH')
                        @endif
                        <!-- Nama Kategori -->
                        <div class="form-group">
                            <label for="nama_kategori" class="flex items-center text-lg font-bold text-terracotta mb-4">
                                <i class="fas fa-tag text-sage-green mr-3 text-xl"></i>
                                Nama Kategori
                                <span class="text-red-500 ml-2 text-xl">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="nama_kategori" name="nama_kategori"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
                                    placeholder="Masukkan nama kategori"
                                    class="w-full px-6 py-4 pl-16 border-2 border-warm-beige rounded-2xl bg-cream text-lg font-medium text-terracotta placeholder-terracotta placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-sage-green focus:border-sage-green">
                                <div class="absolute left-6 top-1/2 transform -translate-y-1/2 text-sage-green">
                                    <i class="fas fa-box text-xl"></i>
                                </div>
                            </div>
                            @error('nama_kategori')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-6 pt-8 border-t-2 border-warm-beige">
                            <a href="{{ route('kategori.index') }}"
                                class="flex items-center justify-center px-8 py-4 bg-warm-brown text-white font-bold text-lg rounded-2xl shadow-lg order-2 sm:order-1 transition-all duration-300 hover:scale-105 active:scale-95">
                                <i class="fas fa-arrow-left mr-3"></i>
                                Kembali
                            </a>

                            <button type="submit"
                                class="flex items-center justify-center px-8 py-4 bg-gradient-sage text-white font-bold text-lg rounded-2xl shadow-lg flex-1 order-1 sm:order-2 transition-all duration-300 hover:scale-105 active:scale-95">
                                <i class="fas fa-save mr-3"></i>
                                Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
