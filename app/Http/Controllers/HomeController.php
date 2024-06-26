<?php

namespace App\Http\Controllers;

use App\Helpers\Feed;
use App\Helpers\Template;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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
        $categories = Template::renderSideBar(Category::get()->toArray());
        $categories['slug'] = Category::pluck('slug', 'id')->toArray();
        $tags = Tag::latest()->take(20)->pluck('name', 'id')->toArray();
        $users = User::latest()->take(6)->get()->toArray();
        $latest_products = Product::latest()->take(6)->get()->toArray();
//        $itemsGold = Feed::getGold();
        $money = Feed::tyGia();
//        dd($itemsGold);
        return view('welcome', compact('categories', 'latest_products', 'tags', 'users', 'money'));
    }

    public function contact(){
        return view('contact');
    }
    public function masterLogin(){
        if(Auth::check() && Auth::user()->role->id == 1) {
            return redirect()->route('master.product.index');
        }
        return view('auth.login');
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

            $data = [
                'file'          => $image,
                'folder'        => '/uploads/product-content',
                'filename'      => $imageName,
            ];

            $imageName = Template::uploadFile($data);
            return response()->json([
                'url' => url('/') . $imageName
            ]);
        }
    }

}
// sản phẩm nổi bật: 4 tag nhiều sp nhiều view nhất, lấy mỗi tag 2 sản phẩm nổi bật nhất(view cao nhất)