<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;


class SlideController extends Controller
{

    public function index()
    {
    	$slides= Slide::all();

    	return view('admin.slide.index', compact('slides'));
    }

    public function add()
    {
    	return view('admin.slide.add');
    }

    public function create(Request $request)
    {
    	if ($request->hasFile('link')) {
            $file=$request->file('link');
            $filename= $file->getClientOriginalName('link');
            $file->move('uploads',$filename);
            echo $filename;
        }
    	Slide::create($request->all());

    	return redirect('admin/slide/them-moi-slide')->with('thongbao', 'Bạn đã thêm mới thành công');
    }

    public function delete($id)
    {
    	$slide= Slide::find($id);
    	$slide->delete();
		$slides= Slide::all();

    	return view('admin.slide.index', compact('slides'));
    }

    public function edit($id)
    {
    	$slide = Slide::find($id);

    	return view('admin.slide.edit', compact('slide'));
    }

    public function update($id, Request $request)
    {
        $slide= Slide::find($id);
        $link= $slide->link;

        if ($request->hasFile('link')) {
            $file=$request->file('link');
            $link= $file->getClientOriginalName('link');
            $file->move('uploads', $link);
        }
        $slide->name = $request->name;
        $slide->content = $request->content;
        $slide->link = $link;
        $slide->save();

        return redirect('admin/slide/sua-slide/'.$id)->with('thongbao', 'Bạn đã sửa slide thành công');
    }

}
