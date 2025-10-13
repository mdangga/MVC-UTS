@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tentang Kami</h1>
    
    <div class="bg-gray-50 p-8 rounded-xl shadow-md mb-8 transition hover:shadow-lg">
        <h2 class="text-green-600 text-2xl font-semibold mb-4">Visi Kami</h2>
        <p class="text-gray-600 leading-relaxed text-justify">
            Menjadi perusahaan terdepan dalam menyediakan produk berkualitas tinggi dengan 
            pelayanan terbaik untuk memenuhi kebutuhan pelanggan di seluruh Indonesia.
        </p>
    </div>
    
    <div class="bg-gray-50 p-8 rounded-xl shadow-md mb-8 transition hover:shadow-lg">
        <h2 class="text-green-600 text-2xl font-semibold mb-4">Misi Kami</h2>
        <ul class="list-disc text-gray-600 leading-relaxed pl-6">
            <li>Menyediakan produk berkualitas dengan harga terjangkau</li>
            <li>Memberikan pelayanan pelanggan yang responsif dan profesional</li>
            <li>Terus berinovasi dalam pengembangan produk</li>
            <li>Membangun kepercayaan jangka panjang dengan pelanggan</li>
        </ul>
    </div>
    
    <div class="bg-gray-50 p-8 rounded-xl shadow-md transition hover:shadow-lg">
        <h2 class="text-green-600 text-2xl font-semibold mb-4">Sejarah Perusahaan</h2>
        <p class="text-gray-600 leading-relaxed text-justify">
            Didirikan pada tahun 2020, kami telah melayani ribuan pelanggan dengan berbagai 
            produk pilihan. Dengan komitmen kuat terhadap kualitas dan kepuasan pelanggan, 
            kami terus berkembang dan menjadi pilihan utama bagi konsumen.
        </p>
    </div>
</div>
@endsection
