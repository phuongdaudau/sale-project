<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('master.user.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('master.user.show', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('master.user.editRole', [
            'user' => $user,
        ]);
    }

    public function updateRole(Request $request, $id){
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->back();

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
        return redirect()->route('master.user.show', $id);
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

    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('Xóa tài khoản thành công!', 'success');
        return redirect()->back();
    }

}
