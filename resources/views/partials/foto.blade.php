<section id="galeri" x-data="{ open: false, selectedImage: '' }" class="pt-16 bg-gradient-to-br from-[#4b4c9d]/10 to-indigo-100 min-h-screen flex items-center overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-24">
            <div class="grid grid-cols-2 gap-4">
                @php
                    $heroImages = [
                        'lebihdeket.jpg',
                        'ninja3.jpg',
                    ];
                @endphp

                @foreach ($heroImages as $file)
                    <div 
                        class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-105 duration-300 cursor-pointer"
                        @click="open = true; selectedImage = '{{ asset('images/galeri/' . $file) }}'"
                    >
                        <img 
                            src="{{ asset('images/galeri/' . $file) }}" 
                            alt="Motor Galeri" 
                            class="w-full h-full object-cover rounded-md transition duration-300 ease-in-out" 
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <p class="text-white text-xs font-medium px-2 text-center">
                                Klik untuk lihat lebih besar
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Motor Bekas Berkualitas
                </h2>
                <p class="text-lg text-gray-600 mb-6 max-w-xl">
                    Jelajahi koleksi motor bekas berkualitas kami. Mulai dari tampilan detail hingga video cinematic — semuanya telah melalui proses seleksi ketat untuk memastikan kualitas terbaik.
                </p>
                <a href="/koleksi" class="inline-block bg-[#4b4c9d] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Lihat Koleksi
                </a>

            </div>

        </div>

        {{-- <div 
    class="fixed inset-0 backdrop-blur-sm bg-black/10 flex items-center justify-center z-50 p-4"
    x-show="open"
    x-transition
    @click.away="open = false"
>
    <img src="{{ asset('images/logo.png') }}" alt="Logo Baherindo" class="h-90 max-w-full rounded-lg shadow-lg">
    
    <button 
        class="absolute top-5 right-5 text-white text-3xl font-bold" 
        @click="open = false"
    >&times;</button>
</div> --}}

    </div>
</section>
