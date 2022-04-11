<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id',  Auth::id())->get()->toArray();
        return view('user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $image = $request->file('image');
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $user->username . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }
            
            if (Storage::disk('public')->exists('profile/' . $user->image)) {
                Storage::disk('public')->delete('profile/' . $user->image);
            }
            $profile = Image::make($image)->resize(150, 150)->save($imageName . '.' . $image->getClientOriginalExtension());
            Storage::disk('public')->put('profile/' . $imageName, $profile);
        } else {
            $imageName = $user->image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->image = $imageName;
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
