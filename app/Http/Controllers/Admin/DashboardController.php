<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\BreadcrumbService;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
     public function profile(){
            return view('admin.user.index');
        }

    public function index(BreadcrumbService $breadcrumbService) {

        $breadcrumbs = $breadcrumbService->generate('admin.dashboard');

        $totalProducts= Product::count();
        $totalCategories =Category::count();
        $totalAllUsers= User::count();
        $totalUser = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();
         $todayDate = Carbon::now()->format('d-m-Y');//popular PHP library
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        $totalOrder = Order:: count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

         $salesData = DB::table('orders')
        ->select(DB::raw('DATE(orders.created_at) as date'), DB::raw('SUM(order_items.quantity * order_items.price) as total_sales'))
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('total_sales');
        //returns them as an array.

    $salesDataLabels = DB::table('orders')
    // starting point for constructing database queries using Laravel's query builder syntax.
        ->select(DB::raw('DATE(orders.created_at) as date'))
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('date');

    // Sample data for latest orders
    $latestOrders = Order::with('orderItems')
        ->orderBy('orders.created_at', 'desc')
        ->take(3) // You can adjust the number of orders to display
        ->get();

    // ... (existing code)
        return
        view('admin.dashboard',compact('totalProducts','thisMonth',
        'totalCategories',
         'totalAllUsers','thisYear','todayDate',
        'totalUser', 'totalAdmin', 'totalOrder', 'todayOrder',
        'thisMonthOrder', 'thisYearOrder','breadcrumbs' ,'salesData',
        'salesDataLabels','latestOrders'));

}
}
