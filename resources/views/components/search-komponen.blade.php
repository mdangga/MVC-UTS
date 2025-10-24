@props(['route', 'placeholder' => 'Cari...', 'perPageOptions' => [5, 10, 25, 50, 100]])
<form id="filterForm" method="GET" action="{{ route($route) }}"
    class="mb-6 flex flex-col md:flex-row gap-3 items-center">
    <div class="relative flex-1">
        <input type="text" name="search" placeholder="{{ $placeholder }}" value="{{ request('search') }}"
            class="w-full p-3 rounded-xl border border-gray-200 shadow-sm" />
        @if (request('search'))
            <a href="{{ route($route) }}"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-900 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4" />
                </svg>
            </a>
        @endif
    </div>

    <select id="per_page" name="per_page" class="p-3 rounded-xl border border-gray-200 select-custom"
        onchange="document.getElementById('filterForm').submit()">
        @foreach ($perPageOptions as $n)
            <option value="{{ $n }}" {{ request('per_page', 5) == $n ? 'selected' : '' }}>
                {{ $n }} / halaman</option>
        @endforeach
    </select>

    <button type="submit" class="px-5 py-3 rounded-xl bg-gradient-sage text-white font-semibold">Cari</button>
</form>
