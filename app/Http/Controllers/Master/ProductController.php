<?php

namespace App\Http\Controllers\Master;

use App\Helpers\Template;
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
        $categories = Category::pluck('name', 'id');
        return view('master.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Template::renderCategories(Category::get()->toArray());
        $tags = Tag::all();
        $warehouses = Warehouse::select('*')->where('type', '=', '1')->get();
        return view('master.product.create', compact('categories', 'tags', 'warehouses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'description'       => 'required',
            'about'             => 'required',
            'category_id'       => 'required',
            'image'             => 'required|max:5120',
            'tags'              => 'required',
        ]);

        $tags = explode(',', $request->tags);
        $tagsId = [];
        foreach ($tags as $item) {
            $tagName = ltrim($item);
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->slug = Str::slug($tagName);
            $tag->save();
            $tagsId[] = $tag->id;
        }

        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name; 
        $slug = Str::slug($request->name);
        $product->slug = $slug;
        $product->about = $request->about;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if($request->hasfile('image')){
            $imagename = '';
            foreach($request->file('image') as $key=>$image){
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'. $currentDate .'-'. $key . '.' . $image->getClientOriginalExtension();
                $data = [
                    'file'          => $image,
                    'folder'        => '/uploads/product-thumb',
                    'filename'      => $imageName,
                ];

                $imagename = Template::uploadFile($data);
            }
            $product->image = $imagename;
        }

        if (isset($request->status)) {
            $product->status = true;
        } else { 
            $product->status = false;
        }
        $product->is_approved = false;
        $product->save();

        $product->tags()->attach($tagsId);

        Toastr::success(' Lưu bài viết thành công!', 'Success');
        return redirect()->route('master.product.index');
    }

    public function show(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        return view('master.product.show', compact('product', 'categories' ));
    }

    public function edit(Product $product)
    {
        $tagName = $product->tags->pluck('name')->toArray();
        $tags = implode(', ', $tagName);
        $categories = Template::renderCategories(Category::get()->toArray());
        return view('master.product.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'              => 'required',
            'description'       => 'required',
            'about'             => 'required',
            'category_id'       => 'required',
            'tags'              => 'required',
        ]);

        $originTag = $product->tags->pluck('name')->toArray();
        $tags = explode(', ', $request->tags);
        $tagsId = [];

        if(array_diff($tags, $originTag)) {
            $originId = $product->tags->pluck('id')->toArray();
            Tag::destroy($originId);
            foreach ($tags as $item) {
                $tagName = ltrim($item);
                $tag = new Tag();
                $tag->name = $tagName;
                $tag->slug = Str::slug($tagName);
                $tag->save();
                $tagsId[] = $tag->id;
            }
        }

        $product->user_id = Auth::id();
        $product->name = $request->name;
        $slug = Str::slug($request->name);
        $product->slug = $slug;
        $product->about = $request->about;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if($request->hasfile('image')){
            $imagename = '';
            foreach($request->file('image') as $key=>$image){
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'. $currentDate .'-'. $key . '.' . $image->getClientOriginalExtension();

                $data = [
                    'file'          => $image,
                    'folder'        => '/uploads/product-thumb',
                    'filename'      => $imageName,
                    'old'           => $product->image,
                ];

                $imagename = Template::uploadFile($data);
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

        $product->tags()->sync($tagsId);

        Toastr::success(' Cập nhật bài viết thành công!', 'Success');
        return redirect()->route('master.product.index');
    }

    public function destroy(Product $product)
    {
        if (Storage::disk('public')->exists('product/' . $product->image)) {
            Storage::disk('public')->delete('product/' . $product->image);
        }
        $product->tags()->detach();
        $product->delete();
        Toastr::success('Xóa bài viết thành công!', 'Success');
        return redirect()->back();
    }

    public function approval($id)
    {
        $product = Product::find($id);
        if ($product->is_approved == false) {
            $product->is_approved = true;
            $product->save();
            Toastr::success('Xác nhận bài viết thành công!', 'Success');
        } else {
            Toastr::info('Bài viết đã được xác nhận!', 'Info');
        }
        return redirect()->back();
    }
}
