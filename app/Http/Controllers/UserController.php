<?php

namespace App\Http\Controllers;

use App\Helpers\Template;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        $categories = Template::renderSideBar(Category::get()->toArray());
        $categories['slug'] = Category::pluck('slug', 'id')->toArray();
        $user = User::where('id',  Auth::id())->first();
        return view('user', compact('user', 'categories'));
    }
    public function createProduct(){
        $categories = Template::renderSideBar(Category::get()->toArray());
        $categories['slug'] = Category::pluck('slug', 'id')->toArray();

        $category = Template::renderCategories(Category::get()->toArray());
        return view('create-product', compact('categories', 'category'));
    }
    public function updateProduct($id){
        $categories = Template::renderSideBar(Category::get()->toArray());
        $categories['slug'] = Category::pluck('slug', 'id')->toArray();
        $category = Template::renderCategories(Category::get()->toArray());
        $product = Product::where('id',  $id)->where('is_approved',  0)->first();
        $tagName = $product->tags->pluck('name')->toArray();
        $tags = implode(', ', $tagName);

        return view('edit-product', compact('categories', 'category', 'product', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $image = $request->file('avatar');
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $user->username . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            $data = [
                'file'          => $image,
                'folder'        => '/uploads/profile',
                'filename'      => $imageName,
                'old'           => $user->image
            ];

            $imageName = Template::uploadFile($data);
        } else {
            $imageName = $user->image;
        }

        $user->name             = $request->name;
        $user->username         = $request->username;
        $user->identify_no      = $request->identify_no;
        $user->phone            = $request->phone;
        $user->date_of_birth    = $request->date_of_birth;
        $user->gender           = $request->gender;
        $user->about            = $request->about;
        $user->image            = $imageName;
        $user->save();
        Toastr::success('Cập nhật thông tin công!', 'success');
        return redirect()->route('customer.account');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Thay đổi mật khẩu thành công!', 'Success');
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('Mât khẩu mới không thể giống mật khẩu cũ.', 'Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Mật khẩu không khớp!', 'Error');
            return redirect()->back();
        }
    }
    public function storeProduct(Request $request)
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
            $image = $request->file('image');
            $imagename = '';
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'. $currentDate . $image->getClientOriginalExtension();
            $data = [
                'file'          => $image,
                'folder'        => '/uploads/product-thumb',
                'filename'      => $imageName,
            ];
            $imagename = Template::uploadFile($data);
            $product->image = $imagename;
        }

        $product->is_approved = false;
        $product->save();

        $product->tags()->attach($tagsId);

        Toastr::success(' Lưu bài viết thành công! Đang đợi admin phê duyệt!', 'Success');
        return redirect()->route('product.list', Auth::user()->id);
    }
    public function storeUpdateProduct(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'              => 'required',
            'description'       => 'required',
            'about'             => 'required',
            'category_id'       => 'required',
            'image'             => 'required|max:5120',
            'tags'              => 'required',
        ]);

        $originTag = $product->tags->pluck('name')->toArray();
        $tags = explode(', ', $request->tags);
        $tagsId = [];

//        dd(array_diff($tags, $originTag));
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
            $image = $request->file('image');
            $imagename = '';
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'. $currentDate .'.' . $image->getClientOriginalExtension();

            $data = [
                'file'          => $image,
                'folder'        => '/uploads/product-thumb',
                'filename'      => $imageName,
                'old'           => $product->image ?? '',
            ];

            $imagename = Template::uploadFile($data);

            $product->image = $imagename;
        }

        $product->update();
        $product->tags()->sync($tagsId);

        Toastr::success(' Cập nhật bài viết thành công!', 'Success');
        return redirect()->route('product.list', Auth::user()->id);
    }

    public function destroyProduct(Product $product)
    {
        $oldFile = public_path() . $product->image;
        if ($product->image && file_exists($oldFile)) {
            unlink($oldFile);
        }
        $product->tags()->detach();
        $product->delete();
        Toastr::success('Xóa bài viết thành công!', 'Success');
        return redirect()->back();
    }


    public function addFavorite($product)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_products()->where('product_id', $product)->count();

        if ($isFavorite == 0) {
            $user->favorite_products()->attach($product);
            Toastr::success('Thêm sản phẩm yêu thích thành công!', 'Success');
            return redirect()->back();
        } else {
            $user->favorite_products()->detach($product);
            Toastr::success('Xóa sản phẩm yêu thích thành công!', 'Success');
            return redirect()->back();
        }
    }

    public function showFavorite(){
        $products = Auth::user()->favorite_products;
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('favorite', compact('tags','categories','products'));
    }
}
