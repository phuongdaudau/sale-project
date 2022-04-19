<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\User;
use App\Models\City;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;

class ShipController extends Controller
{
    public function index()
    {
        $ships = Ship::latest()->get();
        return view('master.ship.index', [
            'ships' => $ships,
        ]);
    }

    public function create()
    {
        $users = User::where('role_id','=','4')->get();
        $orders = Order::where('is_approved','=','1' )->get();
        return view('master.ship.create', compact('users', 'orders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'order' => 'required',
            'status' => 'required',
            'note' => 'required',
        ]);
        $ship = new Ship();
        $ship->user_id = $request->user;
        $ship->order_id = $request->order;
        $ship->status = $request->status;
        $ship->note = $request->note;
        $ship->save();
        Toastr::success('Thêm mới đơn vận chuyển thành công!', 'success');
        return redirect()->route('master.ship.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::where('role_id','=','4')->get();
        $orders = Order::where('is_approved','=','1' )->get();
        $ship = Ship::find($id);
        return view('master.ship.edit', compact('ship', 'users', 'orders'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user' => 'required',
            'order' => 'required',
            'status' => 'required',
            'note' => 'required',
        ]);
        $ship = Ship::find($id);
        $ship->user_id = $request->user;
        $ship->order_id = $request->order;
        $ship->status = $request->status;
        $ship->note = $request->note;
        $ship->save();
        Toastr::success('Thêm mới đơn vận chuyển thành công!', 'success');
        return redirect()->route('master.ship.index');
    }

    public function destroy($id)
    {
        Ship::find($id)->delete();
        Toastr::success('Xóa nhãn thành công!', 'success');
        return redirect()->back();
    }

}
