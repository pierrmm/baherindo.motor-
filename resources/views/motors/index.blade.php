<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Motor') }}
            </h2>
            <a href="{{ route('motors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah Motor
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('motors.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Cari brand, model, atau tahun..."
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                            <select name="brand" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Semua Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                        {{ $brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Semua Status</option>
                                <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                                <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Dipesan</option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Filter
                            </button>
                            <a href="{{ route('motors.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Motors Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($motors as $motor)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="relative">
                            @if($motor->images && count($motor->images) > 0)
                                <img src="{{ Storage::url($motor->images[0]) }}" alt="{{ $motor->brand }} {{ $motor->model }}"
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                    <span class="text-gray-500 dark:text-gray-400">No Image</span>
                                </div>
                            @endif

                            <div class="absolute top-2 right-2">
                                @if($motor->status == 'available')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Tersedia</span>
                                @elseif($motor->status == 'sold')
                                    <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Terjual</span>
                                @else
                                    <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Dipesan</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                {{ $motor->brand }} {{ $motor->model }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">
                                Tahun: {{ $motor->year }} | KM: {{ number_format($motor->mileage) }}
                            </p>
                            <p class="text-xl font-bold text-blue-600 mb-4">
                                {{ $motor->formatted_price }}
                            </p>

                            <div class="flex justify-between items-center">
                                <a href="{{ route('motors.show', $motor) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Detail
                                </a>
                                <div class="flex space-x-2">
                                    <a href="{{ route('motors.edit', $motor) }}"
                                       class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('motors.destroy', $motor) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus motor ini?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada motor yang ditemukan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $motors->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
