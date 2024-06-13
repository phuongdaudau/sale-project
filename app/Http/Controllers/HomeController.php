<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    public function uploadImageCkeditor(Request $request) {
        if($request->hasfile('upload')){
            $image = $request->file('upload');
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate. '-' .$image->getClientOriginalName();
            //check dir exist
            if (!Storage::disk('public')->exists('upload')) {
                Storage::disk('public')->makeDirectory('upload');
            }
            //save resize image
            $productImage = Image::make($image)->save($imageName);
            Storage::disk('public')->put('upload/' . $imageName, $productImage);
            return response()->json([
                'url' => Storage::disk('public')->url('upload/'. $imageName)
            ]);
        }
    }

}
// sản phẩm nổi bật: 4 tag nhiều sp nhiều view nhất, lấy mỗi tag 2 sản phẩm nổi bật nhất(view cao nhất)