<?php

namespace App\Http\Controllers\master;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('master.category.index', [
            'categories' =>  $categories,
        ]);
    }

    public function create()
    {
        $parentIds = Category::whereNull('parent_id')->pluck('name', 'id');
        $res = [];
        $res[] = 'Chọn danh mục cha';
        foreach($parentIds as $key => $val) {
            $res[$key] = $val;
        }
        return view('master.category.create', [
            'parentIds' => $res,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'parent_id'     => 'required',
        ]);

        $slug = Str::slug($request->name);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = $slug;
        $category->save();
        Toastr::success('Category Successfully Saved :)', 'Success');
        return redirect()->route('master.category.index');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parentIds = Category::whereNull('parent_id')->pluck('name', 'id');
        $res = [];
        $res[] = 'Chọn danh mục cha';
        foreach($parentIds as $key => $val) {
            $res[$key] = $val;
        }
        return view('master.category.edit', [
            'category' => $category,
            'parentIds' => $res,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $image = $request->file('image');

        $slug = Str::slug($request->name);
        $category = Category::find($id);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }
            if (Storage::disk('public')->exists('category/' . $category->image)) {
                Storage::disk('public')->delete('category/' . $category->image);
            }

            $category = Image::make($image)->resize(1600, 479)->save($imageName . '.' . $image->getClientOriginalExtension());
            Storage::disk('public')->put('category/' . $imageName, $category);
            if (!Storage::disk('public')->exists('category/banner')) {
                Storage::disk('public')->makeDirectory('category/banner');
            }

            $banner = Image::make($image)->resize(500, 333)->save($imageName . '.' . $image->getClientOriginalExtension());
            Storage::disk('public')->put('category/banner/' . $imageName, $banner);
        } else {
            $imageName = $category->image;
        }
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->save();
        Toastr::success('Category Successfully Updated :)', 'Success');
        return redirect()->route('master.category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (Storage::disk('public')->exists('category/' . $category->image)) {
            Storage::disk('public')->delete('category/' . $category->image);
        }

        if (Storage::disk('public')->exists('category/banner/' . $category->image)) {
            Storage::disk('public')->delete('category/banner/' . $category->image);
        }
        $category->delete();
        Toastr::success('Đã xóa danh mục thành công!', 'Success');
        return redirect()->back();
    }
}
