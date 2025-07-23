<nav class="bg-[#4b4c9d] shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <!-- Ganti ikon dengan gambar logo -->
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-lg mr-3 object-cover">
                    <span class="text-xl font-bold text-white">Baherindo Motor</span>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#home" class="text-white hover:text-[#c4c4f5] px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                    <a href="#galeri" class="text-white hover:text-[#c4c4f5] px-3 py-2 rounded-md text-sm font-medium transition-colors">Galeri</a>
                    <a href="#motors" class="text-white hover:text-[#c4c4f5] px-3 py-2 rounded-md text-sm font-medium transition-colors">Motor</a>
                    <a href="#about" class="text-white hover:text-[#c4c4f5] px-3 py-2 rounded-md text-sm font-medium transition-colors">Tentang Kami</a>
                    <a href="#contact" class="text-white hover:text-[#c4c4f5] px-3 py-2 rounded-md text-sm font-medium transition-colors">Kontak</a>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6 space-x-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-white text-[#4b4c9d] px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#4b4c9d] transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-[#4b4c9d] px-3 py-2 rounded-md text-sm font-medium transition-colors">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-white text-[#4b4c9d] px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#4b4c9d] transition-colors">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-white hover:text-[#ffcccc] focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-[#4b4c9d] border-t border-white">
                <a href="#home" class="text-white hover:text-[#ffcccc] block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#motors" class="text-white hover:text-[#ffcccc] block px-3 py-2 rounded-md text-base font-medium">Motor</a>
                <a href="#about" class="text-white hover:text-[#ffcccc] block px-3 py-2 rounded-md text-base font-medium">Tentang Kami</a>
                <a href="#contact" class="text-white hover:text-[#ffcccc] block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-white text-[#941f1f] block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-[#ffcccc] block px-3 py-2 rounded-md text-base font-medium">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white text-[#941f1f] block px-3 py-2 rounded-md text-base font-medium hover:bg-[#ffcccc]">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
