<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard Baherindo Motor
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Selamat datang, Admin!
            </div>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ openTimeline: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                @foreach([
                    ['title' => 'Total Motor', 'value' => 128, 'color' => 'blue'],
                    ['title' => 'Penjualan Bulan Ini', 'value' => 34, 'color' => 'green'],
                    ['title' => 'Customer', 'value' => 215, 'color' => 'yellow'],
                    ['title' => 'Pendapatan', 'value' => 'Rp 420.500.000', 'color' => 'purple'],
                ] as $stat)
                <div class="bg-gradient-to-r from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-{{ $stat['color'] }}-400 bg-opacity-75">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ $stat['title'] }}</h3>
                            <p class="text-2xl font-bold">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


                {{-- Aktivitas Terbaru --}}
                <div @click="openTimeline = true"
                     class="cursor-pointer bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Aktivitas Terbaru</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Motor Honda Beat 2020 terjual</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500">2 jam yang lalu</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Motor baru ditambahkan: Yamaha Mio 2019</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500">5 jam yang lalu</p>
                            </div>
                        </div>
                        @php
    $motors = [
        ['nama' => 'Beat', 'jumlah_terjual' => 34],
        ['nama' => 'Mio', 'jumlah_terjual' => 28],
        ['nama' => 'Vario', 'jumlah_terjual' => 22],
        ['nama' => 'Nmax', 'jumlah_terjual' => 18],
        ['nama' => 'Scoopy', 'jumlah_terjual' => 11],
    ];
    $maxValue = max(array_column($motors, 'jumlah_terjual'));
@endphp

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 mt-10">
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Motor Terlaris</h3>

    <div class="space-y-4">
        @foreach($motors as $motor)
            @php
                $widthPercent = intval(($motor['jumlah_terjual'] / $maxValue) * 100);
                $colors = ['bg-indigo-600', 'bg-yellow-500', 'bg-green-500', 'bg-pink-500', 'bg-red-500'];
                $barColor = $colors[$loop->index % count($colors)];
            @endphp
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $motor['nama'] }}</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $motor['jumlah_terjual'] }}</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4">
                    <div class="h-4 {{ $barColor }} rounded-full transition-all duration-500" style="width: {{ $widthPercent }}%"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
                    </div>
                </div>
            </div>

            {{-- Modal Timeline --}}
            <div x-show="openTimeline" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div @click.away="openTimeline = false"
                     class="bg-white dark:bg-gray-900 p-6 rounded-xl max-w-lg w-full shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Timeline Aktivitas</h3>
                    <div class="border-l-2 pl-4 space-y-4">
                        <div class="relative">
                            <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full"></div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Honda Beat 2020 terjual<br><span class="text-xs text-gray-500">2 jam yang lalu</span>
                            </p>
                        </div>
                        <div class="relative">
                            <div class="absolute -left-2 top-1 w-3 h-3 bg-blue-500 rounded-full"></div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Yamaha Mio 2019 ditambahkan<br><span class="text-xs text-gray-500">5 jam yang lalu</span>
                            </p>
                        </div>
                        <div class="relative">
                            <div class="absolute -left-2 top-1 w-3 h-3 bg-yellow-500 rounded-full"></div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Customer baru: Ahmad Rizki<br><span class="text-xs text-gray-500">1 hari yang lalu</span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button @click="openTimeline = false"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Tutup</button>
                    </div>
                </div>
            </div>

            {{-- Motor Terlaris (Vertical Bar) --}}

</div>

    
</x-app-layout>
