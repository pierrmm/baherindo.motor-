<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Customer;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalMotors = Motor::count();
        $availableMotors = Motor::where('status', 'available')->count();
        $totalCustomers = Customer::count();

        // Fix for SQLite compatibility - use whereMonth and whereYear instead of DATE_FORMAT
        $monthlyRevenue = Sale::where('status', 'completed')
            ->whereMonth('sale_date', $currentMonth)
            ->whereYear('sale_date', $currentYear)
            ->sum('final_price');

        $monthlySales = Sale::where('status', 'completed')
            ->whereMonth('sale_date', $currentMonth)
            ->whereYear('sale_date', $currentYear)
            ->count();

        $recentActivities = Sale::with(['motor', 'customer'])
            ->latest()
            ->take(5)
            ->get();

        $topSellingMotors = Motor::with(['sales' => function($query) {
            $query->where('status', 'completed');
        }])
        ->whereHas('sales', function($query) {
            $query->where('status', 'completed');
        })
        ->withCount(['sales' => function($query) {
            $query->where('status', 'completed');
        }])
        ->orderBy('sales_count', 'desc')
        ->take(3)
        ->get();

        return view('dashboard', compact(
            'totalMotors',
            'availableMotors',
            'totalCustomers',
            'monthlyRevenue',
            'monthlySales',
            'recentActivities',
            'topSellingMotors'
        ));
    }
}
