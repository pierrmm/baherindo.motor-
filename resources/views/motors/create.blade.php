<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Motor') }}
            </h2>
            <a href="{{ route('motors.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center bg-[#f4f5ff] dark:bg-[#18192f] py-10">
        <div class="w-full max-w-2xl bg-white dark:bg-[#23234a] rounded-3xl shadow-[0_8px_32px_0_rgba(75,76,157,0.18)] p-10 border-2 border-[#4b4c9d] dark:border-[#37387a]">
            <div class="flex items-center justify-center mb-8">
                <div class="w-16 h-16 rounded-full bg-[#4b4c9d] dark:bg-[#37387a] flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 13l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6" />
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-center mb-2 text-[#4b4c9d] dark:text-[#a5b4fc] tracking-wide">Tambah Motor Baru</h1>
            <p class="text-center text-gray-500 dark:text-gray-400 mb-8">Isi detail motor dengan lengkap dan akurat.</p>
            <form action="{{ route('motors.store') }}" method="POST" enctype="multipart/form-data" class="space-y-7">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="brand" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('brand')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="model" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Model</label>
                        <input type="text" name="model" id="model" value="{{ old('model') }}" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('model')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="year" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Tahun</label>
                        <input type="number" name="year" id="year" value="{{ old('year') }}" required min="1990" max="{{ date('Y') + 1 }}"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('year')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="color" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Warna</label>
                        <input type="text" name="color" id="color" value="{{ old('color') }}" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('color')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="mileage" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Kilometer</label>
                        <input type="number" name="mileage" id="mileage" value="{{ old('mileage') }}" required min="0"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('mileage')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="price" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Harga Jual</label>
                        <input type="text" name="price" id="price" value="{{ old('price') }}" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]"
                            oninput="formatPrice(this)">
                        @error('price')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="condition" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Kondisi</label>
                        <select name="condition" id="condition" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition">
                            <option value="">Pilih Kondisi</option>
                            <option value="excellent" {{ old('condition') == 'excellent' ? 'selected' : '' }}>Sangat Baik</option>
                            <option value="good" {{ old('condition') == 'good' ? 'selected' : '' }}>Baik</option>
                            <option value="fair" {{ old('condition') == 'fair' ? 'selected' : '' }}>Cukup</option>
                            <option value="poor" {{ old('condition') == 'poor' ? 'selected' : '' }}>Kurang</option>
                        </select>
                        @error('condition')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="status" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Status</label>
                        <select name="status" id="status" required
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition">
                            <option value="">Pilih Status</option>
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                            <option value="reserved" {{ old('status') == 'reserved' ? 'selected' : '' }}>Dipesan</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="engine_capacity" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Kapasitas Mesin</label>
                        <input type="text" name="engine_capacity" id="engine_capacity" value="{{ old('engine_capacity') }}"
                            placeholder="contoh: 150cc"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('engine_capacity')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="transmission" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Transmisi</label>
                        <select name="transmission" id="transmission"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition">
                            <option value="">Pilih Transmisi</option>
                            <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Automatic" {{ old('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="CVT" {{ old('transmission') == 'CVT' ? 'selected' : '' }}>CVT</option>
                        </select>
                        @error('transmission')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="fuel_type" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Jenis Bahan Bakar</label>
                        <select name="fuel_type" id="fuel_type"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition">
                            <option value="">Pilih Bahan Bakar</option>
                            <option value="Bensin" {{ old('fuel_type') == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                            <option value="Listrik" {{ old('fuel_type') == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                        </select>
                        @error('fuel_type')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="license_plate" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Nomor Plat</label>
                        <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate') }}"
                            placeholder="contoh: B 1234 ABC"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('license_plate')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="purchase_date" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Tanggal Pembelian</label>
                        <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">
                        @error('purchase_date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 col-span-2">
                        <label for="purchase_price" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Harga Beli</label>
                        <input type="text" name="purchase_price" id="purchase_price" value="{{ old('purchase_price') }}"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]"
                            placeholder="Contoh: 15.000,75" oninput="formatPrice(this)">
                        @error('purchase_price')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2 col-span-2">
                        <label for="description" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] focus:ring-2 focus:ring-[#4b4c9d] dark:focus:ring-[#37387a] px-4 py-2 outline-none bg-[#f4f5ff] dark:bg-[#18192f] text-[#4b4c9d] dark:text-[#a5b4fc] transition resize-none placeholder:text-[#4b4c9d] dark:placeholder:text-[#a5b4fc]">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2 col-span-2">
                        <label for="images" class="font-semibold text-[#4b4c9d] dark:text-[#a5b4fc]">Foto Motor</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                            class="rounded-xl border border-[#4b4c9d] dark:border-[#37387a] px-4 py-2 text-[#4b4c9d] dark:text-[#a5b4fc] bg-[#f4f5ff] dark:bg-[#18192f] file:bg-[#4b4c9d] dark:file:bg-[#37387a] file:text-white file:rounded-xl file:px-4 file:py-2 file:border-0 file:font-semibold file:mr-4 hover:file:bg-[#37387a] dark:hover:file:bg-[#23234a] transition">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Pilih beberapa foto (maksimal 2MB per foto)</span>
                        @error('images.*')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between mt-10">
                    <a href="{{ route('motors.index') }}"
                        class="bg-white dark:bg-[#23234a] border border-[#4b4c9d] dark:border-[#37387a] hover:bg-[#4b4c9d] dark:hover:bg-[#37387a] hover:text-white dark:hover:text-white text-[#4b4c9d] dark:text-[#a5b4fc] font-bold py-2 px-8 rounded-xl transition shadow-md">Batal</a>
                    <button type="submit"
                        class="bg-[#4b4c9d] dark:bg-[#37387a] hover:bg-[#37387a] dark:hover:bg-[#23234a] text-white font-bold py-2 px-10 rounded-xl shadow-lg transition">Simpan Motor</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function formatPrice(el) {
        let val = el.value;
        val = val.replace(/[^0-9,]/g, '');
        let parts = val.split(',');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        el.value = parts.join(',');
    }
    </script>
</x-app-layout>
