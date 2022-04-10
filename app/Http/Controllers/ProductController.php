<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $products = Product::latest()->approved()->published()->get();
        $tags = Tag::latest()->get();
        $latest_products = Product::latest()->approved()->published()->take(6)->get()->toArray();
        $best_sale_products = Product::withCount('orders')->approved()->published()->orderBy('orders_count', 'desc')->take(5)->get();
        return view('products', compact('products', 'latest_products', 'best_sale_products', 'categories', 'tags'));
    }
    public function details($slug)
    {
        $product = Product::where('slug', $slug)->approved()->published()->first();
        $category =  $product->categories()->get();
        $related_products = $category[0]->products()->approved()->published()->get();

        $productKey = 'product_'. $product->id;

        if(!Session::has($productKey)){
            $product->increment('view_count');
            Session::put($productKey,1);
        }
        return view('product', compact('product', 'related_products'));
    }

    public function productByCategory($slug){
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $category = Category::where('slug', $slug)->first();
        $products = $category->products()->approved()->published()->get();
        return view('category', compact('tags','categories','category', 'products'));
    }
    
    public function productByTag($slug){
        $tags = Tag::latest()->get();
        $tag = Tag::where('slug', $slug)->first();
        $products = $tag->products()->approved()->published()->get();
        return view('tag', compact('tags','tag', 'products'));
    }
}
