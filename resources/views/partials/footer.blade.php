<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                       <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-lg mr-3 object-cover">
                    <span class="text-xl font-bold">Baherindo Motor</span>
                </div>
                <p class="text-gray-300 mb-6 max-w-md">
                    Dealer motor bekas terpercaya dengan pengalaman lebih dari 8 tahun.
                    Kami menyediakan motor berkualitas dengan harga terbaik dan pelayanan memuaskan.
                </p>
                <div class="flex space-x-4">
    <!-- Instagram -->
    <a href="https://www.instagram.com/baherindo/" target="_blank"
       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-pink-500 transition-colors">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm6.5-.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0zM12 9.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z"/>
        </svg>
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/6281234567890" target="_blank"
       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-500 transition-colors">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 32 32">
            <path d="M16.004 3c-7.18 0-13 5.82-13 13 0 2.289.603 4.541 1.746 6.516L3 29l6.656-1.707A12.928 12.928 0 0016.004 29c7.18 0 13-5.82 13-13s-5.82-13-13-13zm0 2.2c5.945 0 10.8 4.855 10.8 10.8s-4.855 10.8-10.8 10.8a10.728 10.728 0 01-5.482-1.5l-.39-.234-3.977 1.021 1.07-3.746-.25-.4a10.765 10.765 0 01-1.55-5.94c0-5.945 4.855-10.8 10.8-10.8zm-2.416 5.4c-.21 0-.447.014-.684.2-.412.324-1.262 1.235-1.262 3.025s1.29 3.51 1.47 3.75c.177.235 2.495 4.029 6.23 5.44 2.948 1.102 3.545.879 4.18.824.637-.056 2.054-.84 2.34-1.65.288-.81.288-1.507.2-1.65-.088-.142-.324-.233-.684-.412-.362-.178-2.16-1.066-2.496-1.188-.336-.12-.582-.177-.824.178-.24.353-.95 1.188-1.166 1.428-.214.236-.428.27-.79.09-.36-.178-1.52-.562-2.897-1.79-1.07-.958-1.79-2.14-2-2.498-.21-.356-.022-.55.16-.728.164-.163.366-.425.548-.637.18-.213.24-.355.36-.59.12-.237.06-.445-.03-.637-.09-.193-.8-1.92-1.09-2.647-.287-.73-.58-.793-.8-.808z"/>
        </svg>
    </a>
</div>

            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                    <li><a href="/koleksi" class="text-gray-300 hover:text-white transition-colors">Gallery</a></li>
                    <li><a href="#motors" class="text-gray-300 hover:text-white transition-colors">Motor</a></li>
                    <li><a href="#about" class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">info@baherindomotor.com</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">sales@baherindomotor.com</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">+62 21 1234 5678</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">+62 812 3456 7890</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-300 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} Baherindo Motor. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
