<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Motor') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('motors.edit', $motor) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <a href="{{ route('motors.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                       Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Images Section -->
                        <div>
                            @if($motor->images && count($motor->images) > 0)
                                <div class="space-y-4">
                                    <div class="main-image">
                                        <img id="mainImage" src="{{ Storage::url($motor->images[0]) }}"
                                             alt="{{ $motor->brand }} {{ $motor->model }}"
                                             class="w-full h-96 object-cover rounded-lg">
                                    </div>
                                    @if(count($motor->images) > 1)
                                        <div class="grid grid-cols-4 gap-2">
                                            @foreach($motor->images as $index => $image)
                                                <img src="{{ Storage::url($image) }}"
                                                     alt="Image {{ $index + 1 }}"
                                                     class="w-full h-20 object-cover rounded cursor-pointer hover:opacity-75 transition-opacity"
                                                     onclick="changeMainImage('{{ Storage::url($image) }}')">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="w-full h-96 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-lg">No Image Available</span>
                                </div>
                            @endif
                        </div>

                        <!-- Motor Details -->
                        <div class="space-y-6">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $motor->brand }} {{ $motor->model }}
                                </h1>
                                <p class="text-xl text-gray-600 dark:text-gray-400">{{ $motor->year }}</p>
                            </div>

                            <div class="flex items-center space-x-4">
                                <span class="text-3xl font-bold text-blue-600">{{ $motor->formatted_price }}</span>
                                @if($motor->status == 'available')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Tersedia</span>
                                @elseif($motor->status == 'sold')
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Terjual</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Dipesan</span>
                                @endif
                            </div>

                            <!-- Specifications -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Spesifikasi Dasar</h3>
                                    <div class="space-y-2 text-sm">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600 dark:text-gray-400">Warna:</span>
                                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->color }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600 dark:text-gray-400">Kilometer:</span>
                                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ number_format($motor->mileage) }} km</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600 dark:text-gray-400">Kondisi:</span>
                                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->condition_label }}</span>
                                        </div>
                                        @if($motor->engine_capacity)
                                            <div class="flex justify-between">
                                                <span class="text-gray-600 dark:text-gray-400">Mesin:</span>
                                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->engine_capacity }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Detail Teknis</h3>
                                    <div class="space-y-2 text-sm">
                                        @if($motor->transmission)
                                            <div class="flex justify-between">
                                                <span class="text-gray-600 dark:text-gray-400">Transmisi:</span>
                                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->transmission }}</span>
                                            </div>
                                        @endif
                                        @if($motor->fuel_type)
                                            <div class="flex justify-between">
                                                <span class="text-gray-600 dark:text-gray-400">Bahan Bakar:</span>
                                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->fuel_type }}</span>
                                            </div>
                                        @endif
                                        @if($motor->license_plate)
                                            <div class="flex justify-between">
                                                <span class="text-gray-600 dark:text-gray-400">Plat Nomor:</span>
                                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->license_plate }}</span>
                                            </div>
                                        @endif
                                        @if($motor->purchase_date)
                                            <div class="flex justify-between">
                                                <span class="text-gray-600 dark:text-gray-400">Tgl Beli:</span>
                                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $motor->purchase_date->format('d/m/Y') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if($motor->description)
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Deskripsi</h3>
                                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $motor->description }}</p>
                                </div>
                            @endif

                            @if($motor->purchase_price)
                                <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg">
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Informasi Pembelian</h3>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Harga Beli:</span>
                                        <span class="font-bold text-gray-900 dark:text-gray-100">{{ $motor->formatted_purchase_price }}</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-gray-600 dark:text-gray-400">Estimasi Profit:</span>
                                        <span class="font-bold text-green-600">
                                            Rp {{ number_format($motor->price - $motor->purchase_price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="flex space-x-4 pt-4">
                                <a href="{{ route('motors.edit', $motor) }}"
                                   class="flex-1 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                                    Edit Motor
                                </a>
                                <form action="{{ route('motors.destroy', $motor) }}" method="POST" class="flex-1"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus motor ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg">
                                        Hapus Motor
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeMainImage(imageSrc) {
            document.getElementById('mainImage').src = imageSrc;
        }
    </script>
</x-app-layout>
