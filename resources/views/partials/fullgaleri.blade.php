@php
    $images = [
        ['file' => 'lebihdeket.jpg', 'kategori' => 'Yamaha'],
        ['file' => 'ninja3.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'belakang.jpg', 'kategori' => 'Yamaha'],
        ['file' => 'zxfoto1.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'dtakeer.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'zxfoto2.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'kawasakidtaker.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'mt25.jpg', 'kategori' => 'Yamaha'],
        ['file' => 'yamahamt25.jpg', 'kategori' => 'Yamaha'],
        ['file' => 'yamahar15.jpg', 'kategori' => 'Yamaha'],
        ['file' => 'ninja250.jpg', 'kategori' => 'Kawasaki'],
    ];

    $videos = [
        'cineninja.mp4',
        'cinemt25.mp4',
        'ciner15.mp4',
    ];

    $kategoris = collect($images)->pluck('kategori')->unique()->prepend('All');
@endphp

<section 
    x-data="{ open: false, selectedImage: '', selectedKategori: 'All' }" 
    class="relative py-16 px-4 bg-gradient-to-br from-[#4b4c9d]/10 to-indigo-100 min-h-screen"
>
    <div class="max-w-7xl mx-auto relative z-10">
        <h1 class="text-4xl font-bold text-gray-800 mt-12 text-center">
            Galeri Motor Bekas
        </h1>
        <p class="text-gray-600 text-sm text-center max-w-2xl mx-auto mb-8">
            Koleksi motor bekas berkualitas yang siap untuk Anda miliki. Jelajahi berbagai pilihan dari berbagai merek dengan tampilan dan performa terbaik.
        </p>

        <!-- Dropdown Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-10">
            <div class="relative w-full sm:w-64" x-data="{ open: false }">
                <button 
                    @click="open = !open" 
                    class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-full pl-4 pr-10 py-2 shadow-sm flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-[#4b4c9d] transition"
                >
                    <span x-text="selectedKategori"></span>
                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div 
                    x-show="open" 
                    @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute mt-2 w-full bg-white border border-gray-200 rounded-lg shadow-lg z-50"
                >
                    <ul class="max-h-60 overflow-auto">
                        @foreach ($kategoris as $kategori)
                            <li 
                                @click="selectedKategori = '{{ $kategori }}'; open = false"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100 hover:text-indigo-700 cursor-pointer transition"
                                :class="{ 'bg-indigo-100 text-indigo-700': selectedKategori === '{{ $kategori }}' }"
                            >
                                {{ $kategori }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach ($images as $item)
                <div 
                    class="break-inside-avoid relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-[1.02] duration-300 cursor-pointer opacity-0 scale-95 animate-on-scroll"
                    x-show="selectedKategori === 'All' || selectedKategori === '{{ $item['kategori'] }}'"
                    @click="open = true; selectedImage = '{{ asset('images/galeri/' . $item['file']) }}';"
                >
                    <img 
                        src="{{ asset('images/galeri/' . $item['file']) }}" 
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

        <h2 class="text-3xl font-semibold text-gray-800 mt-20 mb-8 text-center">Video Cinematic Motor</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($videos as $video)
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-[1.02] duration-300 opacity-0 scale-95 animate-on-scroll">
                    <video controls class="w-full h-full object-cover rounded-lg">
                        <source src="{{ asset('videos/' . $video) }}" type="video/mp4">
                        Browser tidak mendukung video.
                    </video>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div 
        class="fixed shadow-lg inset-0 backdrop-blur-sm bg-black/10 flex items-center justify-center z-50 p-4" 
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

<!-- Scroll Animation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'scale-95');
                    entry.target.classList.add('opacity-100', 'scale-100', 'transition-all', 'duration-700');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    });
</script>
