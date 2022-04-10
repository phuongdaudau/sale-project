<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get(); 
        return view('master.order.index', compact('orders'));
    }


    public function show(Order $order)
    {
        return view('master.order.show', compact('order'));
    }


    public function edit(Order $order)
    {
        return view('master.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // $this->validate($request, [
        //     'status'     => 'required',
        // ]);
        // $order->status = $request->status;
        // $order->update();
        // Toastr::success('Cập nhật trạng thái đơn hàng thành công!', 'Success');
        // return redirect()->route('master.order.tracking');
    }
 
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();
        Toastr::success('Xóa đơn hàng thành công!', 'Success');
        return redirect()->back();
    }
}
