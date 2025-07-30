<nav class="bg-[#4b4c9d] shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-lg mr-3 object-cover">
                    <span class="text-xl font-bold text-white">Baherindo Motor</span>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="/" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        Home
                        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                    <a href="/koleksi" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        Gallery
                        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                    <a href="#motors" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        Motor
                        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                    <a href="#about" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        Tentang Kami
                        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                    <a href="#contact" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        Kontak
                        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6 space-x-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-white text-[#4b4c9d] px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c4c4f5] hover:text-[#4b4c9d] transition-all duration-300 transform hover:scale-105">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white relative group px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                                Login
                                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-[#c4c4f5] origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                            </a>
                        @endauth
                    @endif
                </div>
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-white hover:text-[#c4c4f5] focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden transition-all duration-300 ease-in-out origin-top">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-[#4b4c9d] border-t border-white/20">
                <a href="#home" class="text-white hover:text-[#c4c4f5] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Home</a>
                <a href="#motors" class="text-white hover:text-[#c4c4f5] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Motor</a>
                <a href="#about" class="text-white hover:text-[#c4c4f5] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Tentang Kami</a>
                <a href="#contact" class="text-white hover:text-[#c4c4f5] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Kontak</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-white text-[#4b4c9d] block px-3 py-2 rounded-md text-base font-medium hover:bg-[#c4c4f5] hover:text-[#4b4c9d] transition-colors duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-[#c4c4f5] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>