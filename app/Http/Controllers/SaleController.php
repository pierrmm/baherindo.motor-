<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Motor;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Sale::with(['motor', 'customer', 'user']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('sale_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('sale_date', '<=', $request->date_to);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('customer', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('motor', function($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
            });
        }

        $sales = $query->latest()->paginate(15);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motors = Motor::where('status', 'available')->get();
        $customers = Customer::all();

        return view('sales.create', compact('motors', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'motor_id' => 'required|exists:motors,id',
            'customer_id' => 'required|exists:customers,id',
            'sale_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'required|in:cash,transfer,credit',
            'status' => 'required|in:pending,completed,cancelled',
            'notes' => 'nullable|string',
            'sale_date' => 'required|date',
        ]);

        $discount = $validated['discount'] ?? 0;
        $finalPrice = $validated['sale_price'] - $discount;

        $validated['user_id'] = Auth::id();
        $validated['discount'] = $discount;
        $validated['final_price'] = $finalPrice;

        $sale = Sale::create($validated);

        // Update motor status if sale is completed
        if ($validated['status'] === 'completed') {
            Motor::find($validated['motor_id'])->update(['status' => 'sold']);
        }

        return redirect()->route('sales.index')
            ->with('success', 'Penjualan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale->load(['motor', 'customer', 'user']);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $motors = Motor::where('status', 'available')
            ->orWhere('id', $sale->motor_id)
            ->get();
        $customers = Customer::all();

        return view('sales.edit', compact('sale', 'motors', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'motor_id' => 'required|exists:motors,id',
            'customer_id' => 'required|exists:customers,id',
            'sale_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'required|in:cash,transfer,credit',
            'status' => 'required|in:pending,completed,cancelled',
            'notes' => 'nullable|string',
            'sale_date' => 'required|date',
        ]);

        $discount = $validated['discount'] ?? 0;
        $finalPrice = $validated['sale_price'] - $discount;

        $validated['discount'] = $discount;
        $validated['final_price'] = $finalPrice;

        // Handle motor status changes
        $oldStatus = $sale->status;
        $newStatus = $validated['status'];

        if ($oldStatus !== $newStatus) {
            if ($newStatus === 'completed') {
                Motor::find($validated['motor_id'])->update(['status' => 'sold']);
            } elseif ($oldStatus === 'completed' && $newStatus !== 'completed') {
                Motor::find($sale->motor_id)->update(['status' => 'available']);
            }
        }

        $sale->update($validated);

        return redirect()->route('sales.index')
            ->with('success', 'Penjualan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        // If sale was completed, make motor available again
        if ($sale->status === 'completed') {
            Motor::find($sale->motor_id)->update(['status' => 'available']);
        }

        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Penjualan berhasil dihapus!');
    }

    public function getMotorPrice(Motor $motor)
    {
        return response()->json(['price' => $motor->price]);
    }
}
