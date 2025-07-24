@php
    $images = [
        ['file' => 'lebihdeket.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'ninja3.jpg', 'kategori' => 'Kawasaki'],
        ['file' => 'belakang.jpg', 'kategori' => 'Kawasaki'],
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
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto relative z-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 mt-12 text-center">
            Galeri Motor Bekas
        </h1>

        <!-- Dropdown Filter -->
        <div class="flex justify-center mb-12">
            <select x-model="selectedKategori" class="border border-gray-300 rounded px-4 py-2 text-gray-700">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                @endforeach
            </select>
        </div>

        <!-- Galeri Gambar -->
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

        <!-- Galeri Video -->
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
