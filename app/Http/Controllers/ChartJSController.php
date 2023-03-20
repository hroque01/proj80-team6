<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use DB;
use Illuminate\Support\Facades\Auth;

class ChartJSController extends Controller
{
    public function index()
{
    $orders = DB::table('orders')
    ->select(
        DB::raw('YEAR(create_date) AS year'),
        DB::raw('MONTH(create_date) AS month'),
        DB::raw('SUM(total) AS total_sales'),
        DB::raw('COUNT(*) AS order_count')
    )
    ->where('restaurant_id', Auth::id())
    ->where('completed', 1)
    ->groupBy('year', 'month')
    ->get();



    $labels = $orders->map(function($order) {
        return $order->year . '-' . str_pad($order->month, 2, '0', STR_PAD_LEFT);
    });
    $data = $orders->pluck('total_sales');
                
    return view('layouts.chart', compact('labels', 'data'));
}

}
