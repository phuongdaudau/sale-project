<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('master.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $warehouses = Warehouse::select('*')->where('type', '=', '1')->get();
        return view('master.product.create', compact('categories', 'tags', 'warehouses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'weight'     => 'required',
            'price'     => 'required',
            'quantity'     => 'required',
            'image'     => 'required',
            'categories' => 'required',
            'tags'      => 'required',
            'warehouse'      => 'required',
            'about'      => 'required',
        ]);
        
        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name; 
        $slug = Str::slug($request->name);
        $product->slug = $slug;
        $product->about = $request->about;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->warehouse_id = $request->warehouse;

        if($request->hasfile('image')){
            $imagename = '';
            foreach($request->file('image') as $key=>$image){
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'. $currentDate .'-'. $key . '.' . $image->getClientOriginalExtension(); 
                //check dir exist
                if (!Storage::disk('public')->exists('product')) {
                    Storage::disk('public')->makeDirectory('product');
                }
                //save resize image
                $productImage = Image::make($image)->resize(540, 540)->save($imageName . '.' . $image->getClientOriginalExtension());
                Storage::disk('public')->put('product/' . $imageName, $productImage);

                $imagename = $imagename. ',' . $imageName;
            }
            $product->image = $imagename;
        }

        if (isset($request->status)) {
            $product->status = true;
        } else { 
            $product->status = false;
        }
        $product->is_approved = true;
        $product->save();

        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        Toastr::success(' Lưu sản phẩm thành công!', 'Success');
        return redirect()->route('master.product.index');
    }

    public function show(Product $product)
    {
        return view('master.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $warehouses = Warehouse::select('*')->where('type', '=', '1')->get();
        return view('master.product.edit', compact('product', 'categories', 'tags', 'warehouses'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'     => 'required',
            'weight'     => 'required',
            'price'     => 'required',
            'quantity'     => 'required',
            'image'     => 'image',
            'categories' => 'required',
            'tags'      => 'required',
            'warehouse'      => 'required',
            'about'      => 'required',
        ]);
    
        $product->user_id = Auth::id();
        $product->name = $request->name; 
        $slug = Str::slug($request->name);
        $product->slug = $slug;
        $product->about = $request->about;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->warehouse_id = $request->warehouse;

        if($request->hasfile('image')){
            $imagename = '';
            foreach($request->file('image') as $key=>$image){
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'. $currentDate .'-'. $key . '.' . $image->getClientOriginalExtension(); 
                //check dir exist
                if (!Storage::disk('public')->exists('product')) {
                    Storage::disk('public')->makeDirectory('product');
                }
                //delete old image
                if (Storage::disk('public')->exists('product/' . $product->image)) {
                    Storage::disk('public')->delete('product/' . $product->image);
                }
                    //save resize image
                $productImage = Image::make($image)->resize(540, 540)->save($imageName . '.' . $image->getClientOriginalExtension());
                Storage::disk('public')->put('product/' . $imageName, $productImage);

                $imagename = $imagename. ',' . $imageName;
            }
            $product->image = $imagename;
        }

        if (isset($request->status)) {
            $product->status = true;
        } else { 
            $product->status = false;
        }
        $product->is_approved = true;
        $product->update();

        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);

        Toastr::success(' Cập nhật sản phẩm thành công!', 'Success');
        return redirect()->route('master.product.index');
    }

    public function destroy(Product $product)
    {
        if (Storage::disk('public')->exists('product/' . $product->image)) {
            Storage::disk('public')->delete('product/' . $product->image);
        }
        $product->categories()->detach();
        $product->tags()->detach();
        $product->delete();
        Toastr::success('Xóa sản phẩm thành công!', 'Success');
        return redirect()->back();
    }

    public function approval($id)
    {
        $product = Product::find($id);
        if ($product->is_approved == false) {
            $product->is_approved = true;
            $product->save();
            Toastr::success('Xác nhận sản phẩm thành công :)', 'Success');
        } else {
            Toastr::info('Sản phẩm đã được xác nhận :)', 'Info');
        }
        return redirect()->back();
    }
}
