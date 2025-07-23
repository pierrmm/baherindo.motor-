{{-- About Section Component --}}
<section id="about" class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="absolute top-0 right-0 w-72 h-72 bg-blue-100 rounded-full -translate-y-36 translate-x-36 opacity-30"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-100 rounded-full translate-y-48 -translate-x-48 opacity-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-4">
                {{ __('Tentang Kami') }}
            </span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                {{ __('Baherindo Motor') }}
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {{-- Content Column --}}
            <div class="order-2 lg:order-1">
                <div class="space-y-6">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ __('Baherindo Motor adalah dealer motor bekas terpercaya yang telah melayani ribuan pelanggan sejak tahun 2015. Kami berkomitmen untuk menyediakan motor bekas berkualitas dengan harga yang kompetitif dan pelayanan terbaik.') }}
                    </p>
                    
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ __('Dengan pengalaman lebih dari 8 tahun di industri otomotif, kami memahami kebutuhan pelanggan akan kendaraan yang berkualitas dan terpercaya. Setiap motor yang kami jual telah melalui proses inspeksi ketat untuk memastikan kondisi terbaik.') }}
                    </p>

                    {{-- Key Features --}}
                    <div class="pt-4">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('Mengapa Memilih Kami?') }}</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">{{ __('Inspeksi ketat untuk setiap unit motor') }}</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">{{ __('Garansi dan layanan purna jual') }}</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">{{ __('Proses kredit yang mudah dan cepat') }}</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">{{ __('Harga kompetitif dan transparan') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Statistics Grid --}}
                <div class="grid grid-cols-2 gap-6 mt-10 pt-8 border-t border-gray-200">
                    @php
                        $stats = [
                            ['number' => '1000+', 'label' => 'Motor Terjual', 'icon' => 'motorcycle'],
                            ['number' => '8+', 'label' => 'Tahun Pengalaman', 'icon' => 'calendar'],
                            ['number' => '500+', 'label' => 'Customer Puas', 'icon' => 'star'],
                            ['number' => '24/7', 'label' => 'Customer Service', 'icon' => 'support']
                        ];
                    @endphp

                    @foreach($stats as $stat)
                    <div class="text-center group">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 rounded-xl mb-3 group-hover:bg-blue-200 transition-colors duration-300">
                            @switch($stat['icon'])
                                @case('motorcycle')
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @break
                                @case('calendar')
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    @break
                                @case('star')
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    @break
                                @case('support')
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5z"></path>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        <div class="text-3xl font-bold text-blue-600 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                            {{ $stat['number'] }}
                        </div>
                        <div class="text-gray-600 text-sm font-medium">
                            {{ __($stat['label']) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Image Column --}}
            <div class="order-1 lg:order-2 relative">
                <div class="relative group">
                    {{-- Main image container --}}
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-96 lg:h-[500px] rounded-3xl flex items-center justify-center overflow-hidden shadow-2xl group-hover:shadow-3xl transition-all duration-500">
                        @if(isset($aboutImage))
                            <img src="{{ $aboutImage }}" alt="{{ __('Tentang Baherindo Motor') }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="text-center">
                                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="text-gray-500 text-lg font-medium">{{ __('Foto Showroom') }}</span>
                                <p class="text-gray-400 text-sm mt-2">{{ __('Gambar akan ditampilkan di sini') }}</p>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Decorative elements --}}
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-full opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    
                    {{-- Floating badge --}}
                    <div class="absolute top-4 left-4 bg-white rounded-full px-4 py-2 shadow-lg">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-semibold text-gray-700">{{ __('Buka Sekarang') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Contact CTA --}}
                <div class="mt-8 text-center">
                    <a href="#contact" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        {{ __('Hubungi Kami') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Custom Styles --}}
@push('styles')
<style>
    .bg-grid-pattern {
        background-image: url("data:image/svg+xml,%3csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3e%3cg fill='none' fill-rule='evenodd'%3e%3cg fill='%23000000' fill-opacity='0.1'%3e%3ccircle cx='7' cy='7' r='1'/%3e%3ccircle cx='27' cy='7' r='1'/%3e%3ccircle cx='47' cy='7' r='1'/%3e%3ccircle cx='7' cy='27' r='1'/%3e%3ccircle cx='27' cy='27' r='1'/%3e%3ccircle cx='47' cy='27' r='1'/%3e%3ccircle cx='7' cy='47' r='1'/%3e%3ccircle cx='27' cy='47' r='1'/%3e%3ccircle cx='47' cy='47' r='1'/%3e%3c/g%3e%3c/g%3e%3c/svg%3e");
    }
    
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
    }
</style>
@endpush