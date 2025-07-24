@php
    use App\Models\Motor;

    $motors = Motor::where('status', 'available')->latest()->take(6)->get();
@endphp

<section id="motors" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Motor Pilihan</h2>
            <p class="text-xl text-gray-600">Koleksi motor bekas berkualitas dengan berbagai pilihan merek</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  @forelse($motors as $motor)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        @if (!empty($motor->images) && count($motor->images) > 0)
            <img src="{{ asset('storage/' . $motor->images[0]) }}" alt="{{ $motor->brand }} {{ $motor->model }}"
                 class="w-full h-48 object-cover">
        @else
            <div class="bg-gray-200 h-48 flex items-center justify-center">
                <span class="text-gray-500">{{ $motor->brand }} {{ $motor->model }} {{ $motor->year }}</span>
            </div>
        @endif

        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $motor->brand }} {{ $motor->model }} {{ $motor->year }}</h3>
            <p class="text-gray-600 mb-4">
                KM: {{ number_format($motor->mileage) }} |
                Tahun: {{ $motor->year }} |
                Warna: {{ $motor->color }}
            </p>
            <div class="flex justify-between items-center mb-4">
                <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($motor->price) }}</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    {{ ucfirst($motor->status) }}
                </span>
            </div>
            <a href="{{ route('motors.show', $motor) }}"
               class="block text-center w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Lihat Detail
            </a>
        </div>
    </div>
@empty
    <p class="col-span-3 text-center text-gray-500">Tidak ada motor tersedia.</p>
@endforelse


        </div>

        <div class="text-center mt-12">
            <a href=" " class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Lihat Semua Motor
            </a>
        </div>
    </div>
</section>
