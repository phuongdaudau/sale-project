<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ship;
use App\Models\Tag;
use App\Models\Warehouse;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class DashboardController extends Controller
{
    public function index()
    {
        $ship_ok = Ship::where('user_id', '=', Auth::id())->where('status', '=', '6')->count();
        $shipping = Ship::where('user_id', '=', Auth::id())->where('status', '=', '5')->count();
        $ship_need = Ship::where('user_id', '=', Auth::id())->where('status', '<', '5')->count();
        $ship_cancel = Ship::where('user_id', '=', Auth::id())->where('status', '=', '0')->count();
        $ships = Ship::where('user_id', '=', Auth::id())->get();

        return view('shipper.dashboard',compact('ship_ok', 'shipping', 'ship_need', 'ship_cancel', 'ships'));
    } 
    public function order($id){
        $order = Order::find($id);
        return view('shipper.detailOrder', compact('order'));
    }
    public function update($id){
        $ship = Ship::find($id);
        return view('shipper.updateShip', compact('ship'));
    }
    public function updateShip(Request $request, $id){
        $this->validate($request, [
            'status'     => 'required',
            'note'     => 'required',
        ]);
        $ship = Ship::find($id);
        $ship->status = $request->status;
        $ship->note = $request->note;
        $ship->update();
        Toastr::success('Cập nhật trạng thái đơn hàng thành công!', 'Success');
        return redirect()->route('shipper.dashboard');
    }

}
 