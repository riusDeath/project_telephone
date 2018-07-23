<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
    	$cats = Category::search()->orderBy('id','desc')->paginate(12);
    	return view('admin.category.index',compact('cats'));
    }

    public function add(){
    	$cats = Category::all();
		return view('admin.category.add', [
			'cats' => $cats,
		]);
	}

    public function create(CategoryRequest $req)
    {
		Category::create($req->all());
		Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Thêm danh mục',
            'object' => 'danh-muc',
        ]);

		return redirect()->route('danh-muc');
	}

	public function delete($id)
	{
		Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Xóa danh mục '.Category::find($id)->name,
            'object' => 'danh-muc',
        ]);
		Category::destroy($id);

		return redirect()->route('danh-muc');
	}

	public function edit($id)
	{
    	$cats = Category::where('id', '<>', $id)->get();
		$cat = Category::find($id);
		
		return view('admin.category.edit', compact('cats', 'cat'));
	}

	public function update(CategoryRequest $req,$id)
	{
		$cat = Category::find($id);
		$cat->update($req->all());
		$cat->save();
		Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Sửa danh mục id: '.$id,
            'object' => 'danh-muc',
        ]);

		return redirect('admin/danh-muc/sua-danh-muc/'.$id)->with('thongbao', 'Sửa danh mục thành công');
	}
}
