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
        $cats = Category::search()
        ->where('parent', 0)
        ->orderBy('id','desc')
        ->paginate(12);
        $cat_child = Category::search()
        ->where('parent', '<>', 0)
        ->orderBy('id','desc')
        ->paginate(12);

        return view('admin.category.index',compact('cats', 'cat_child'));
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

		return redirect()->back();
    }

    public function delete($id)
    {
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

        return redirect('admin/category/update_category/'.$id)
        ->with('mess', trans('admin.update_successfully')) ;
    }
}
