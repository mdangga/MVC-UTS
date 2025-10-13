@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <div class="text-center py-16 px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Selamat Datang di Aplikasi Kami</h1>

        <p class="text-lg text-gray-600 mb-10">
            Temukan berbagai produk dan layanan terbaik untuk kebutuhan Anda
        </p>

        <div class="grid gap-6 md:grid-cols-3 mt-10">
            <div class="relative bg-gray-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow text-center group">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div
                        class="bg-green-500 text-white p-3 rounded-full shadow-md flex items-center justify-center transition-transform duration-300 group-hover:[transform:scaleX(-1)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="m12 .084l3.934 7.983L23.917 12l-7.983 3.933L12 23.916l-3.933-7.983l-7.983-3.932l7.983-3.934zm0 5.656L9.934 9.934L5.74 12l4.193 2.066L12 18.26l2.066-4.194L18.26 12l-4.194-2.066z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-green-600 font-semibold text-lg mb-2">Kualitas Terbaik</h3>
                    <p class="text-gray-600 text-sm">Produk pilihan dengan standar kualitas tinggi</p>
                </div>
            </div>

            <div class="relative bg-gray-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow text-center group">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div
                        class="bg-green-500 text-white p-3 rounded-full shadow-md flex items-center justify-center transition-transform duration-300 group-hover:[transform:scaleX(-1)]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-6 h-6"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M3.5 13v-3H1l3.5-5v3H7zm3.3 7q-1.25 0-2.125-.875T3.8 17q0-.625.288-1.175t.787-.95L10.85 6h-4.3l.425-2H18l-.925 4H20l3 4l-1 5h-2q0 1.25-.875 2.125T17 20t-2.125-.875T14 17H9.8q0 1.25-.875 2.125T6.8 20m.2-2q.425 0 .713-.288T8 17t-.288-.712T7 16t-.712.288T6 17t.288.713T7 18m10 0q.425 0 .713-.288T18 17t-.288-.712T17 16t-.712.288T16 17t.288.713T17 18m-1.075-5h4.825l.1-.525L19 10h-2.375z" />
                        </svg>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-green-600 font-semibold text-lg mb-2">Pengiriman Cepat</h3>
                    <p class="text-gray-600 text-sm">Layanan pengiriman yang cepat dan aman</p>
                </div>
            </div>

            <div class="relative bg-gray-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow text-center group">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div
                        class="bg-green-500 text-white p-3 rounded-full shadow-md flex items-center justify-center transition-transform duration-300 group-hover:[transform:scaleX(-1)]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="w-6 h-6"
                            viewBox="0 0 16 16">
                            <g fill="currentColor">
                                <path
                                    d="M8.069 0c.262 0 .52.017.76.057a4 4 0 0 1 .697.154q.34.102.674.263c.217.103.44.229.663.366c.377.24.748.434 1.126.589a7.5 7.5 0 0 0 2.331.525q.607.045 1.257.046v4q0 1.139-.291 2.166a9 9 0 0 1-.789 1.943a10.3 10.3 0 0 1-1.188 1.725a15 15 0 0 1-1.492 1.532a18 18 0 0 1-1.703 1.325q-.892.62-1.794 1.143l-.24.143l-.24-.143a27 27 0 0 1-1.806-1.143a16 16 0 0 1-1.703-1.325a15 15 0 0 1-1.491-1.532a11 11 0 0 1-1.194-1.725a9.8 9.8 0 0 1-.789-1.943A8 8 0 0 1 .571 6V2q.65-.001 1.258-.046a8 8 0 0 0 1.188-.171c.383-.086.766-.2 1.143-.354A6.6 6.6 0 0 0 5.28.846C5.72.56 6.166.349 6.606.21A4.8 4.8 0 0 1 8.069 0m6.502 2.983a9.6 9.6 0 0 1-2.234-.377a8 8 0 0 1-2.046-.943A4.3 4.3 0 0 0 9.23 1.16A3.9 3.9 0 0 0 8.074.994a4 4 0 0 0-1.165.166a4 4 0 0 0-1.058.503A8 8 0 0 1 3.8 2.61q-1.063.309-2.229.378v3.017q0 .993.258 1.908a8.6 8.6 0 0 0 .72 1.743a9.6 9.6 0 0 0 1.08 1.572c.417.491.862.948 1.342 1.382q.72.651 1.509 1.206q.797.556 1.594 1.017a22 22 0 0 0 1.589-1.017a15 15 0 0 0 1.514-1.206c.48-.434.926-.891 1.343-1.382a9.6 9.6 0 0 0 1.08-1.572a8.3 8.3 0 0 0 .709-1.743a6.8 6.8 0 0 0 .262-1.908z" />
                                <path fill-rule="evenodd"
                                    d="m11.797 4.709l-.44-.378l-.406.035l-4.36 5.148l-1.485-2.12l-.4-.068l-.463.331l-.069.4l1.909 2.726l.217.12l.457.028l.234-.102l4.835-5.715z"
                                    clip-rule="evenodd" />
                            </g>
                        </svg>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-green-600 font-semibold text-lg mb-2">Terpercaya</h3>
                    <p class="text-gray-600 text-sm">Dipercaya oleh ribuan pelanggan</p>
                </div>
            </div>
        </div>
    </div>
@endsection
