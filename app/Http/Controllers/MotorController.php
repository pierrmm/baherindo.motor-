<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        $query = Motor::query();

        // Filter by brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%");
            });
        }

        $motors = $query->latest()->paginate(12);
        $brands = Motor::distinct()->pluck('brand');

        return view('motors.index', compact('motors', 'brands'));
    }

    public function create()
    {
        return view('motors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
           'price' => ['required'],
            'condition' => 'required|in:excellent,good,fair,poor',
            'status' => 'required|in:available,sold,reserved',
            'description' => 'nullable|string',
            'engine_capacity' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'license_plate' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable', // hapus 'numeric'

            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['purchase_price'] = $request->filled('purchase_price')
    ? (float) str_replace(',', '.', str_replace('.', '', $request->purchase_price))
    : null;

        $validated['price'] = (float) str_replace(',', '.', str_replace('.', '', $request->price));

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('motors', 'public');
                $imagePaths[] = $path;
            }
        }

        $validated['images'] = $imagePaths;

        Motor::create($validated);

        return redirect()->route('motors.index')
            ->with('success', 'Motor berhasil ditambahkan!');
    }

    public function show(Motor $motor)
    {
        return view('motors.show', compact('motor'));
    }

    public function edit(Motor $motor)
    {
        return view('motors.edit', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'condition' => 'required|in:excellent,good,fair,poor',
            'status' => 'required|in:available,sold,reserved',
            'description' => 'nullable|string',
            'engine_capacity' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'license_plate' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle new image uploads
        $imagePaths = $motor->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('motors', 'public');
                $imagePaths[] = $path;
            }
        }

        $validated['images'] = $imagePaths;

        $motor->update($validated);

        return redirect()->route('motors.index')
            ->with('success', 'Motor berhasil diperbarui!');
    }

    public function destroy(Motor $motor)
    {
        // Delete images from storage
        if ($motor->images) {
            foreach ($motor->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $motor->delete();

        return redirect()->route('motors.index')
            ->with('success', 'Motor berhasil dihapus!');
    }

    public function deleteImage(Request $request, Motor $motor)
    {
        $imageIndex = $request->input('image_index');
        $images = $motor->images ?? [];

        if (isset($images[$imageIndex])) {
            // Delete from storage
            Storage::disk('public')->delete($images[$imageIndex]);

            // Remove from array
            unset($images[$imageIndex]);
            $images = array_values($images); // Re-index array

            $motor->update(['images' => $images]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
