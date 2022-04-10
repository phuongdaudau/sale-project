<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller 
{
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('master.tag.index', [
            'tags' => $tags,
        ]);
    }
 
    public function create()
    {
        return view('master.tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        Toastr::success('Thêm mới nhãn thành công!', 'success');
        return redirect()->route('master.tag.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('master.tag.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        Toastr::success('Chỉnh sửa nhãn thành công!', 'success');
        return redirect()->route('master.tag.index');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        Toastr::success('Xóa nhãn thành công!', 'success');
        return redirect()->back();

    }
}
