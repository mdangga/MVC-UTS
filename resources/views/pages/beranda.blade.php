<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
                    },
                    backgroundImage: {
                        'gradient-custom': 'linear-gradient(135deg, #F7F4EA 0%, #EBD9D1 100%)',
                        'gradient-sage': 'linear-gradient(135deg, #A8BBA3, #8FA085)',
                        'gradient-terracotta': 'linear-gradient(135deg, #B87C4C, #A56840)',
                        'gradient-brown': 'linear-gradient(135deg, #9B8B6B, #8A7A5A)',
                    }
                }
            }
        }
    </script>
    <style>
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
        }
    </style>
</head>

<body class="bg-gradient-custom min-h-screen">
    <header class="py-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="glass-effect rounded-3xl shadow-2xl p-6 relative overflow-hidden">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-terracotta">Dashboard</h1>
                    <p class="text-lg opacity-80 mt-2 text-terracotta">Sistem Manajemen Inventaris</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Alert -->
    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="max-w-7xl mx-auto px-6 mb-8">
            <div class="glass-effect rounded-2xl shadow-lg p-6 border-l-4 border-sage-green">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sage-green">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="font-medium text-lg text-terracotta">
                            <?= htmlspecialchars($_SESSION['flash']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <!-- Cards Grid -->
    <main class="max-w-7xl mx-auto px-6 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Barang Card -->
            <a href="{{ route('barang.index') }}" class="card-hover block group">
                <div class="glass-effect rounded-2xl shadow-lg overflow-hidden h-full border border-gray-100">
                    <!-- Header -->
                    <div class="p-6 text-center bg-gradient-sage">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 bg-white bg-opacity-20">
                            <i class="fas fa-box text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Barang</h3>
                    </div>
                    <!-- Content -->
                    <div class="p-6">
                        <p class="text-terracotta mb-4 leading-relaxed">
                            Kelola data barang, stok, dan harga dengan mudah dan efisien.
                        </p>
                        <div class="flex items-center text-sm text-terracotta opacity-75">
                            <i class="fas fa-arrow-right mr-2 group-hover:translate-x-1 transition-transform"></i>
                            <span>Lihat Detail</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Kategori Card -->
            <a href="{{ route('kategori.index') }}" class="card-hover block group">
                <div class="glass-effect rounded-2xl shadow-lg overflow-hidden h-full border border-gray-100">
                    <!-- Header -->
                    <div class="p-6 text-center bg-gradient-terracotta">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 bg-white bg-opacity-20">
                            <i class="fas fa-tags text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Kategori</h3>
                    </div>
                    <!-- Content -->
                    <div class="p-6">
                        <p class="text-terracotta mb-4 leading-relaxed">
                            Organisir dan kelola kategori barang untuk kemudahan pencarian.
                        </p>
                        <div class="flex items-center text-sm text-terracotta opacity-75">
                            <i class="fas fa-arrow-right mr-2 group-hover:translate-x-1 transition-transform"></i>
                            <span>Lihat Detail</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Pemasok Card -->
            <a href="{{ route('pemasok.index') }}" class="card-hover block group md:col-span-2 xl:col-span-1">
                <div class="glass-effect rounded-2xl shadow-lg overflow-hidden h-full border border-gray-100">
                    <!-- Header -->
                    <div class="p-6 text-center bg-gradient-brown">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4 bg-white bg-opacity-20">
                            <i class="fas fa-truck text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Pemasok</h3>
                    </div>
                    <!-- Content -->
                    <div class="p-6">
                        <p class="text-terracotta mb-4 leading-relaxed">
                            Kelola informasi pemasok dan hubungan bisnis Anda.
                        </p>
                        <div class="flex items-center text-sm text-terracotta opacity-75">
                            <i class="fas fa-arrow-right mr-2 group-hover:translate-x-1 transition-transform"></i>
                            <span>Lihat Detail</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </main>
    @include('partials.footer')
</body>
</html>