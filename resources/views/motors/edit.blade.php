<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Motor') }}
            </h2>
            <a href="{{ route('motors.show', $motor) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('motors.update', $motor) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Brand -->
                            <div>
                                                              <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                                <input type="text" name="brand" id="brand" value="{{ old('brand', $motor->brand) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('brand')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Model -->
                            <div>
                                <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                                <input type="text" name="model" id="model" value="{{ old('model', $motor->model) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('model')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Year -->
                            <div>
                                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                                <input type="number" name="year" id="year" value="{{ old('year', $motor->year) }}" required
                                       min="1990" max="{{ date('Y') + 1 }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Color -->
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Warna</label>
                                <input type="text" name="color" id="color" value="{{ old('color', $motor->color) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('color')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mileage -->
                            <div>
                                <label for="mileage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kilometer</label>
                                <input type="number" name="mileage" id="mileage" value="{{ old('mileage', $motor->mileage) }}" required
                                       min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('mileage')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Jual</label>
                                <input type="number" name="price" id="price" value="{{ old('price', $motor->price) }}" required
                                       min="0" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Condition -->
                            <div>
                                <label for="condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kondisi</label>
                                <select name="condition" id="condition" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Pilih Kondisi</option>
                                    <option value="excellent" {{ old('condition', $motor->condition) == 'excellent' ? 'selected' : '' }}>Sangat Baik</option>
                                    <option value="good" {{ old('condition', $motor->condition) == 'good' ? 'selected' : '' }}>Baik</option>
                                    <option value="fair" {{ old('condition', $motor->condition) == 'fair' ? 'selected' : '' }}>Cukup</option>
                                    <option value="poor" {{ old('condition', $motor->condition) == 'poor' ? 'selected' : '' }}>Kurang</option>
                                </select>
                                @error('condition')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select name="status" id="status" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Pilih Status</option>
                                    <option value="available" {{ old('status', $motor->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="sold" {{ old('status', $motor->status) == 'sold' ? 'selected' : '' }}>Terjual</option>
                                    <option value="reserved" {{ old('status', $motor->status) == 'reserved' ? 'selected' : '' }}>Dipesan</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Engine Capacity -->
                            <div>
                                <label for="engine_capacity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kapasitas Mesin</label>
                                <input type="text" name="engine_capacity" id="engine_capacity" value="{{ old('engine_capacity', $motor->engine_capacity) }}"
                                       placeholder="contoh: 150cc"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('engine_capacity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transmission -->
                            <div>
                                <label for="transmission" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Transmisi</label>
                                <select name="transmission" id="transmission"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Pilih Transmisi</option>
                                    <option value="Manual" {{ old('transmission', $motor->transmission) == 'Manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="Automatic" {{ old('transmission', $motor->transmission) == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                    <option value="CVT" {{ old('transmission', $motor->transmission) == 'CVT' ? 'selected' : '' }}>CVT</option>
                                </select>
                                @error('transmission')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fuel Type -->
                            <div>
                                <label for="fuel_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Bahan Bakar</label>
                                <select name="fuel_type" id="fuel_type"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Pilih Bahan Bakar</option>
                                    <option value="Bensin" {{ old('fuel_type', $motor->fuel_type) == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                                    <option value="Listrik" {{ old('fuel_type', $motor->fuel_type) == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                                </select>
                                @error('fuel_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- License Plate -->
                            <div>
                                <label for="license_plate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Plat</label>
                                <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate', $motor->license_plate) }}"
                                       placeholder="contoh: B 1234 ABC"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('license_plate')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Purchase Date -->
                            <div>
                                <label for="purchase_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Pembelian</label>
                                <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $motor->purchase_date?->format('Y-m-d')) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('purchase_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Purchase Price -->
                            <div>
                                <label for="purchase_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Beli</label>
                                <input type="number" name="purchase_price" id="purchase_price" value="{{ old('purchase_price', $motor->purchase_price) }}"
                                                                             min="0" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('purchase_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Deskripsi detail tentang motor...">{{ old('description', $motor->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Images -->
                        @if($motor->images && count($motor->images) > 0)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Gambar Saat Ini</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach($motor->images as $index => $image)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Motor Image"
                                                 class="w-full h-32 object-cover rounded-lg border border-gray-300">
                                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                                <button type="button" onclick="removeImage({{ $index }})"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                                    Hapus
                                                </button>
                                            </div>
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}" id="existing_image_{{ $index }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- New Images -->
                        <div>
                            <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tambah Gambar Baru</label>
                            <input type="file" name="images[]" id="images" multiple accept="image/*"
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Pilih beberapa gambar (JPG, PNG, maksimal 2MB per file)</p>
                            @error('images')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('images.*')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 hidden">
                            <!-- Preview images will be inserted here -->
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('motors.show', $motor) }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Update Motor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview and Removal -->
    <script>
        // Image preview functionality
        document.getElementById('images').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (e.target.files.length > 0) {
                preview.classList.remove('hidden');

                Array.from(e.target.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'relative';
                            div.innerHTML = `
                                <img src="${e.target.result}" alt="Preview" class="w-full h-32 object-cover rounded-lg border border-gray-300">
                                <div class="absolute top-2 right-2">
                                    <button type="button" onclick="removePreview(this)" class="bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                        ×
                                    </button>
                                </div>
                            `;
                            preview.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            } else {
                preview.classList.add('hidden');
            }
        });

        // Remove preview image
        function removePreview(button) {
            button.closest('.relative').remove();
            const preview = document.getElementById('imagePreview');
            if (preview.children.length === 0) {
                preview.classList.add('hidden');
            }
        }

        // Remove existing image
        function removeImage(index) {
            if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
                document.getElementById('existing_image_' + index).remove();
                document.querySelector(`[onclick="removeImage(${index})"]`).closest('.relative').remove();
            }
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = ['brand', 'model', 'year', 'color', 'mileage', 'price', 'condition', 'status'];
            let isValid = true;

            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi.');
            }
        });

        // Auto-format price inputs
        document.getElementById('price').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d]/g, '');
            if (value) {
                e.target.value = parseInt(value).toLocaleString('id-ID');
            }
        });

        document.getElementById('purchase_price').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d]/g, '');
            if (value) {
                e.target.value = parseInt(value).toLocaleString('id-ID');
            }
        });

        // Remove formatting before form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const priceField = document.getElementById('price');
            const purchasePriceField = document.getElementById('purchase_price');

            priceField.value = priceField.value.replace(/[^\d]/g, '');
            purchasePriceField.value = purchasePriceField.value.replace(/[^\d]/g, '');
        });
    </script>
</x-app-layout>
