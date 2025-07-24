<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard Baherindo Motor
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Selamat datang, {{ Auth::user()->name }}!
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-400 bg-opacity-75">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Total Motor</h3>
                            <p class="text-2xl font-bold">{{ $totalMotors }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-400 bg-opacity-75">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Penjualan Bulan Ini</h3>
                            <p class="text-2xl font-bold">{{ $monthlySales }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-400 bg-opacity-75">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Customer</h3>
                            <p class="text-2xl font-bold">{{ $totalCustomers }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-400 bg-opacity-75">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Pendapatan</h3>
                            <p class="text-2xl font-bold">{{ $monthlyRevenue }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('motors.create') }}" class="flex items-center p-4 bg-blue-50 dark:bg-blue-900 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-800 transition-colors">
                            <div class="p-2 bg-blue-500 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Tambah Motor</span>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                            <div class="p-2 bg-green-500 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Lihat Stok</span>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-yellow-50 dark:bg-yellow-900 rounded-lg hover:bg-yellow-100 dark:hover:bg-yellow-800 transition-colors">
                            <div class="p-2 bg-yellow-500 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Customer</span>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-purple-50 dark:bg-purple-900 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-800 transition-colors">
                            <div class="p-2 bg-purple-500 rounded-lg mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Laporan</span>
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
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

                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Customer baru mendaftar: Ahmad Rizki</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500">1 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-extrabold text-[#3a3b7a] dark:text-[#b3b4e0] tracking-tight">Motor Terlaris</h3>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#4b4c9d] to-[#6c6dd6] hover:from-[#3a3b7a] hover:to-[#4b4c9d] text-white text-sm font-semibold rounded-lg shadow transition-all duration-200 hover:scale-105 hover:shadow-xl">
                        Lihat Semua
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full shadow">Ready</span>
                            <span class="text-white font-bold text-xl drop-shadow">Honda Beat 2020</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Honda Beat 2020</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2020 &bull; KM: 15.000</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 12.500.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full shadow">Ready</span>
                            <span class="text-white font-bold text-xl drop-shadow">Yamaha Mio 2019</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Yamaha Mio 2019</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2019 &bull; KM: 22.000</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 10.800.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded-full shadow">Booking</span>
                            <span class="text-white font-bold text-xl drop-shadow">Suzuki Nex 2021</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Suzuki Nex 2021</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2021 &bull; KM: 8.500</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 14.200.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full shadow">Ready</span>
                            <span class="text-white font-bold text-xl drop-shadow">Honda Vario 2018</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Honda Vario 2018</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2018 &bull; KM: 18.000</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 13.000.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full shadow">Ready</span>
                            <span class="text-white font-bold text-xl drop-shadow">Yamaha NMAX 2022</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Yamaha NMAX 2022</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2022 &bull; KM: 5.000</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 27.000.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="rounded-xl overflow-hidden shadow-lg bg-gradient-to-br from-[#e9eafc] to-white dark:from-[#23244a] dark:to-gray-900 hover:shadow-2xl hover:-translate-y-2 hover:scale-105 transition-all duration-300 border border-[#e0e1f7] dark:border-[#3a3b7a]">
                        <div class="relative h-40 bg-[#4b4c9d] dark:bg-[#3a3b7a] flex items-center justify-center">
                            <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-3 py-1 rounded-full shadow">Sold</span>
                            <span class="text-white font-bold text-xl drop-shadow">Suzuki Satria 2017</span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-[#3a3b7a] dark:text-[#b3b4e0] mb-1">Suzuki Satria 2017</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">Tahun: 2017 &bull; KM: 25.000</p>
                            <p class="text-lg font-extrabold text-[#4b4c9d] dark:text-[#b3b4e0] mb-2">Rp 11.000.000</p>
                            <button class="mt-3 w-full px-4 py-2 bg-[#4b4c9d] hover:bg-[#3a3b7a] text-white rounded-lg font-semibold transition-all duration-200">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
