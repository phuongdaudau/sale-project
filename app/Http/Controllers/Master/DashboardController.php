<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ship;
use App\Models\Tag;
use App\Models\Warehouse;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $category_count = Category::all()->count();
        $tag_count = Tag::all()->count();
        $warehouse_count = Warehouse::all()->count();
        $product_count = Product::all()->count();
        $order_count = Order::all()->count();
        $ship_count = Ship::all()->count();

        $staff_count = User::where('role_id', 2)->count();
        $shipper_count = User::where('role_id', 4)->count();
        $customer_count = User::where('role_id', 3)->count();
        $new_customers_today = User::where('role_id', 3)->whereDate('created_at', Carbon::today())->count();

        $best_sale_products = Product::withCount('orders')->orderBy('orders_count', 'desc')->take(5)->get();

        return view('master.dashboard',compact(
            'category_count',
            'tag_count',
            'warehouse_count',
            'product_count',
            'order_count',
            'ship_count',
            'staff_count',
            'shipper_count',
            'customer_count',
            'ship_count',
            'new_customers_today',
            'best_sale_products',
        ));
    }

}
 