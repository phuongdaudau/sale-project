<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $latest_products = Product::latest()->take(6)->get()->toArray();
        return view('welcome', compact('categories', 'latest_products', 'tags'));
    }

    public function contact(){
        return view('contact');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")->approved()->published()->paginate(9);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('search', compact('categories', 'tags','products', 'query'));
    }

    public function tinymce(Request $request) {
        dd(123);
    }

}
// sản phẩm nổi bật: 4 tag nhiều sp nhiều view nhất, lấy mỗi tag 2 sản phẩm nổi bật nhất(view cao nhất)