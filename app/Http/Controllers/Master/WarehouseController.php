<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Brian2694\Toastr\Facades\Toastr;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        return view('master.warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        return view('master.warehouse.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'address'     => 'required',
            'type'     => 'required',
        ]);
        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->type = $request->type;
        $warehouse->status = 0;
        $warehouse->save();
        Toastr::success('Thêm mới kho hàng thành công!', 'success');
        return redirect()->route('master.warehouse.index');
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('master.warehouse.edit', compact('warehouse'));
    }

    public function update(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->type = $request->type;
        $warehouse->status = 0;
        $warehouse->save();
        Toastr::success('Chỉnh sửa nhãn thành công!', 'success');
        return redirect()->route('master.warehouse.index');
    }

    public function destroy($id)
    {
        Warehouse::find($id)->delete();
        Toastr::success('Xóa kho hàng thành công!', 'success');
        return redirect()->back();
    }
}
