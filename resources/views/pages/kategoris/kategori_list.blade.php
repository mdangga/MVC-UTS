@extends('layouts.main')

@section('title', 'Daftar Kategori')

@section('content')
@section('header_title', 'Daftar Kategori')
@section('header_description', 'Kelola Inventaris Anda')
<x-search-komponen route="kategori.index" placeholder="Cari kategori..." />

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6">
    @if ($kategoris->count())
        <!-- Add New Item Card -->
        <div
            class="flex justify-center items-center card-hover glass-effect rounded-2xl shadow-lg border-2 border-dashed border-sage-green">
            <div class="p-4 text-center">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl mb-3 shadow-md bg-gradient-sage">
                    <i class="fas fa-plus text-lg text-white"></i>
                </div>
                <h3 class="text-lg font-bold mb-2 text-terracotta">Tambah Kategori Baru</h3>
                <p class="text-sm opacity-80 mb-4 text-terracotta">Tambahkan kategori ke inventaris</p>
                <a href="{{ route('kategori.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>

        <!-- Item Cards -->
        @foreach ($kategoris as $kategori)
            <div class="item card-hover glass-effect rounded-2xl shadow-lg overflow-hidden">
                <!-- Item Header -->
                <div class="p-3 relative bg-gradient-terracotta">
                    <div
                        class="absolute top-2 right-2 px-2 py-1 rounded-lg text-xs font-bold shadow-md bg-cream text-terracotta">
                        ID: {{ $kategori->id_kategori }}
                    </div>
                </div>

                <!-- Item Body -->
                <div class="p-3 space-y-3">
                    <div class="text-center p-2 rounded-xl bg-cream">
                        <p class="text-xs font-medium opacity-80 text-terracotta">Kategori</p>
                        <p class="text-sm font-bold text-terracotta truncate">
                            {{ $kategori->nama_kategori }}
                        </p>
                    </div>
                </div>

                <!-- Item Footer -->
                <div class="p-3 text-center bg-warm-beige">
                    <a href="{{ route('kategori.edit', $kategori->id_kategori) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                        <span>Edit</span>
                        <i class="fas fa-pen-to-square ml-2 text-xs"></i>
                    </a>

                    <button onclick="confirmDelete({{ $kategori->id_kategori }})"
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-red-500">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                    </button>
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
                    Belum Ada Kategori
                </h3>
                <p class="text-lg opacity-80 mb-6 text-terracotta">
                    Belum ada kategori yang ditambahkan.
                </p>
                <a href="{{ route('kategori.create') }}"
                    class="inline-flex items-center px-6 py-3 font-semibold rounded-2xl shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 text-white bg-gradient-sage">
                    <i class="fas fa-plus mr-3"></i>
                    <span>Tambah Kategori</span>
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Pagination -->
<div class="mt-6">
    {!! $kategoris->appends(request()->except('page'))->links() !!}
</div>

<!-- Delete Modal -->
<div id="deleteModal"
    class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50 transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm text-center">
        <h2 class="text-lg font-semibold mb-4 text-terracotta">Hapus Kategori</h2>
        <p class="text-sm text-gray-600 mb-6">Apakah kamu yakin ingin menghapus kategori ini? Tindakan ini tidak bisa
            dibatalkan.</p>
        <div class="flex justify-center gap-4">
            <button onclick="closeDeleteModal()"
                class="px-4 py-2 rounded-lg text-sm font-medium text-warm-brown bg-warm-beige hover:bg-cream transition">
                Batal
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('body_scripts')
<script>
    function confirmDelete(id) {
        const form = document.getElementById('deleteForm');
        form.action = `/kategori/${id}/destroy`;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    // Klik di luar modal = tutup
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });

    // Tekan ESC = tutup
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>
@endsection
