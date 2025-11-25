<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController
{
    public function index()
    {
        // Data for Orders Chart (Last 7 days)
        $ordersData = \App\Models\Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $ordersData->pluck('date');
        $orderCounts = $ordersData->pluck('count');

        // Data for Revenue Chart (Last 7 days)
        $revenueData = \App\Models\Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->where('status', 'delivered')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $revenueDates = $revenueData->pluck('date');
        $revenueAmounts = $revenueData->pluck('total');

        // Recent Orders
        $recentOrders = \App\Models\Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('dates', 'orderCounts', 'revenueDates', 'revenueAmounts', 'recentOrders'));
    }
}
