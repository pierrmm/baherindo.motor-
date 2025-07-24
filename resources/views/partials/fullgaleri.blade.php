@php
    $images = [
        'lebihdeket.jpg',
        'ninja3.jpg',
        'belakang.jpg',
        'zxfoto1.jpg',
        'dtakeer.jpg',
        'zxfoto2.jpg',
        'kawasakidtaker.jpg',
        'mt25.jpg',
        'yamahamt25.jpg',
        'yamahar15.jpg',
        'ninja250.jpg',
        'ninja250.jpg',
        'ninja250.jpg',
        'ninja250.jpg',
        'ninja250.jpg',
        'ninja250.jpg',
    ];

    $totalItems = count($images);
    $perPage = 8;
    $currentPage = request()->get('page', 1);
    $start = ($currentPage - 1) * $perPage;
    $paginatedImages = array_slice($images, $start, $perPage);
@endphp

<section class="pt-16 bg-gradient-to-br from-[#4b4c9d]/10 to-indigo-100 min-h-screen flex items-center overflow-hidden" x-data="{ open: false, selectedImage: '', selectedTitle: '', selectedYear: '' }">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-12 mt-16 text-center">
            Galeri Motor Bekas
        </h1>

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach ($paginatedImages as $i => $file)
                <div 
                    class="break-inside-avoid relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-[1.02] duration-300 cursor-pointer"
                    @click="open = true; selectedImage = '{{ asset('images/galeri/' . $file) }}'; selectedTitle = 'Motor {{ $i + $start + 1 }}'; selectedYear = 'Tahun 20{{ 10 + $i + $start + 1 }}';"
                >
                    <img 
                        src="{{ asset('images/galeri/' . $file) }}" 
                        alt="Motor Galeri" 
                        class="w-full object-cover rounded-md transition duration-300 ease-in-out" 
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-xs font-medium px-2 text-center">Klik untuk lihat lebih besar</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12 space-x-1">
            @for ($page = 1; $page <= ceil($totalItems / $perPage); $page++)
                <a 
                    href="?page={{ $page }}" 
                    class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium rounded-full transition 
                        {{ $page == $currentPage 
                            ? 'bg-[#4b4c9d] text-white shadow-lg ring-2 ring-[#4b4c9d]' 
                            : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300' }}">
                    {{ $page }}
                </a>
            @endfor
        </div>
    </div>

    <!-- Modal -->
    <div 
        class="fixed inset-0 backdrop-blur-sm bg-black/10 flex items-center justify-center z-50 p-4" 
        x-show="open" 
        x-transition 
        x-cloak
    >
        <div class="p-0 rounded-none bg-transparent shadow-none max-w-5xl mx-auto relative" @click.outside="open = false">
            <button @click="open = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl font-bold">&times;</button>
            <img :src="selectedImage" alt="Preview" class="w-full h-[90vh] rounded mb-4" />
        </div>
    </div>
</section>
