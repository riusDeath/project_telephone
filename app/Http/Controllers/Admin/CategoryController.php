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

    public function add()
    {
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
            'action' => 'add category',
            'object' => 'category',
        ]);

		return redirect()->back();
    }

    public function delete($id)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'delete category '.Category::find($id)->name,
            'object' => 'category',
        ]);
        $category = Category::find($id);

        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }		
        $category->save();

        return redirect()->back();
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
            'action' => 'update category id: '.$id,
            'object' => 'category',
        ]);

        return redirect('admin/category/update_category/'.$id)
        ->with('mess', trans('admin.update_successfully')) ;
    }
}
