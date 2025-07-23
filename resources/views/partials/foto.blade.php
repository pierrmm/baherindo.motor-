<section id="galeri" x-data="{ open: false, selectedImage: '' }" class="pt-16 bg-gradient-to-br from-indigo-100 to-[#4b4c9d]/10 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                Galeri Foto & Video Motor Bekas
            </h2>
            <p class="text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
                Jelajahi koleksi motor bekas berkualitas kami. Mulai dari tampilan detail hingga video cinematic — semuanya telah melalui proses seleksi ketat untuk memastikan kualitas terbaik.
            </p>
            <a href="#contact" class="inline-block bg-[#4b4c9d] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Hubungi Kami
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $galeri = [
                    ['type' => 'image', 'file' => 'zxfoto1.jpg', 'deskripsi' => 'Kawasaki Ninja 250cc'],
                    ['type' => 'image', 'file' => 'belakang.jpg', 'deskripsi' => 'Yamaha MT-25 - Tampak Belakang'],
                    ['type' => 'video', 'file' => 'videos/ciner15.mp4'],
                    ['type' => 'image', 'file' => 'lebihdeket.jpg', 'deskripsi' => 'Yamaha R15 V3 - Tampak Lebih Dekat'],
                    ['type' => 'video', 'file' => 'videos/cineninja.mp4'],
                    ['type' => 'image', 'file' => 'dtakeer.jpg', 'deskripsi' => 'Kawasaki Dtraker - Special Edtion'],
                    ['type' => 'video', 'file' => 'videos/cinemt25.mp4'],
                    ['type' => 'image', 'file' => 'zxfoto3.jpg', 'deskripsi' => 'Kawasaki Ninja 250cc - Dashboard'],
                    ['type' => 'image', 'file' => 'yamahamt25.jpg', 'deskripsi' => 'Yamaha MT-25'],
                ];
            @endphp

            @foreach ($galeri as $item)
                @if ($item['type'] === 'image')
                    <div 
                        class="relative group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition transform hover:scale-105 duration-300 cursor-pointer"
                        @click="open = true; selectedImage = '{{ asset('images/galeri/' . $item['file']) }}'"
                    >
                        <img 
                            src="{{ asset('images/galeri/' . $item['file']) }}" 
                            alt="Motor Bekas" 
                            class="w-full h-full object-cover rounded-lg transition duration-300 ease-in-out" 
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <p class="text-white text-sm font-medium px-4 text-center">
                                {{ $item['deskripsi'] }}
                            </p>
                        </div>
                    </div>
                @elseif ($item['type'] === 'video')
                    <div class="rounded-xl shadow-lg overflow-hidden bg-white group hover:shadow-xl transition">
                        <div class="aspect-[9/16] bg-black">
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ asset($item['file']) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div 
            class="fixed inset-0 backdrop-blur-sm bg-black/10 flex items-center justify-center z-50 p-4"
            x-show="open"
            x-transition
            @click.away="open = false"
        >
            <img :src="selectedImage" alt="Foto Motor HD" class="max-h-[90vh] max-w-full rounded-lg shadow-lg">
            <button 
                class="absolute top-5 right-5 text-white text-3xl font-bold" 
                @click="open = false"
            >&times;</button>
        </div>
    </div>
</section>
