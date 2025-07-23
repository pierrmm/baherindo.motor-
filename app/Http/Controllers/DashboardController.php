<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMotors = Motor::count();
        $availableMotors = Motor::where('status', 'available')->count();
        $totalCustomers = Customer::count();
        $monthlyRevenue = Sale::where('status', 'completed')
            ->whereMonth('sale_date', Carbon::now()->month)
            ->whereYear('sale_date', Carbon::now()->year)
            ->sum('final_price');
        
        $monthlySales = Sale::where('status', 'completed')
            ->whereMonth('sale_date', Carbon::now()->month)
            ->whereYear('sale_date', Carbon::now()->year)
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