<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\warranty_period;
use App\Models\Rate;
use App\Models\OrderDetail;
use App\Models\Attribute;
use App\Models\ProductAtt;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\PayUService\Exception;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductAtributeRequest;


class ProductController extends Controller
{
    public function index(Request $request)
    {        
        if (isset($request->sort) && $request->sort !=0) {
            if ($request->sort == 1) {
                $products = Product::where('total', 0)->paginate(12)->appends('sort', $request->sort);
            } else {
                $products =  Product::select()->orderBy('avg_rate', 'desc')->paginate(12)->appends('sort', $request->sort);          
            }           
        } else {
           $products = Product::search()->orderBy('id', 'desc')->paginate(12);
        }

        return view('admin.product.index', compact('products'));

    }

    public function add()
    {
    	$Brands = Brand::all();
    	$categoris = Category::all();
    	$warranty_periods = warranty_period::all();

    	return view('admin.product.add', compact('brands', 'categoris', 'warranty_periods'));
    }

    public function create(ProductRequest $request)
    {
    	$filename = '';

        if ($request->hasFile('link')) {
            $file = $request->file('link');
            $filename = $file->getClientOriginalName('link');
            $file->move('uploads', $filename);
        }
       
        $request->merge([
             'image' => $filename,
        ]);
        Product::create($request->all());
        $Brands = Brand::all();
    	$categoris = Category::all();
    	$warranty_periods = warranty_period::all();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Thêm mới sản phẩm ',
            'object' => 'san-pham',
        ]);

    	return view('admin.product.add', compact('brands', 'categoris', 'warranty_periods'))->with('thongbao', 'Thêm mới thành công');
    }

    public function views($id)
    {
        if ($product = Product::findOrFail($id)) {
            return view('admin.product.views', compact('product'));
        } else {
            echo "Không tìm thấy sản phẩm cỏ ".$id." để sửa.";
        }
    }

    public function edit($id)
    { 
        $product = Product::find($id);
        $Brands = Brand::all();
        $categories = Category::all();
        $warranty_periods = warranty_period::all();

        return view('admin.product.edit', compact('brands', 'categories', 'warranty_periods', 'product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $fileName = $request->imaget;

        if ($request->hasFile('link')) {
            $file = $request->file('link');
            $fileName = $file->getClientOriginalName('link');
            $file->move('uploads', $fileName);
        }

        $request->merge([
             'image' => $fileName,
        ]);
        $product = Product::find($id);
        $product->update($request->all());
        $product->save();       
        $product = Product::find($id);
        $Brands = Brand::all();
        $categoris = Category::all();
        $warranty_periods = warranty_period::all();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Sửa sản phẩm id: '.$id,
            'object' => 'san-pham',
        ]);

        return view('admin.product.edit', compact('brands', 'categoris', 'warranty_periods', 'product'))->with('thongbao', 'Sửa thành công') ;      
    }

    public function att()
    {
        $attributes = Attribute::select()->orderBy('id', 'desc')->paginate(12);

        return view('admin.product.att',compact('attributes'));
    }

    public function product_hot($id, $hot)
    {
        $product = Product::find($id);
        $product->hot = $hot;
        $product->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Sửa độ hot sản phẩm id:'.$id,
            'object' => 'san-pham',
        ]);

        return redirect('/admin/san-pham');
    }

    public function proAtt($id)
    {
        $attributes = Attribute::all();
        $product = Product::find($id);
        $types = Attribute::select('types')->groupBy('types')->get();

        return view('admin.product.proAtt', compact('product', 'attributes', 'types'));
    }

    public function deleteAtt( $prodcut_id, $id)
    {   
        $proAtt = ProductAtt::find($id);      
        $proAtt->delete();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Xóa thông số kỹ thuật của sản phẩm id: '.$prodcut_id,
            'object' => 'san-pham',
        ]);

        return redirect('admin/san-pham/xem-thong-so-ky-thuat/'.$prodcut_id);
    }

    public function createAtt(Request $request, $id)
    {
        foreach ($request->attribute_id as $attribute_id) {
            $count = ProductAtt::select()->where(['product_id' => $id, 'attribute_id' => $attribute_id ])->count();
            if ($count == 0) {
            ProductAtt::create([
                    'product_id' => $id,
                    'attribute_id' => $attribute_id,
                ]);            
            }
        }

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Thêm thông số kỹ thuật của sản phẩm '.$id,
            'object' => 'san-pham',
        ]);
        
        return redirect('admin/san-pham/xem-thong-so-ky-thuat/'.$id)->with('thongbao', "Thêm thuộc tính thành công");
        
    }

    public function addAtt(ProductAtributeRequest $request)
    {
        Attribute::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Thêm thông số kỹ thuật ',
            'object' => 'thong-so-ky-thuat',
        ]);

        return redirect('admin/san-pham/thong-so-ky-thuat/')->with('thongbao', 'Thêm thuộc tính thành công');

    }

    public function exitAtt($id)
    {
        $att= Attribute::find($id);
        $att->delete();

        return redirect('admin/san-pham/thong-so-ky-thuat');
    }

    public function editAtt($id)
    {       
        $att= Attribute::find($id);

        return view('admin.product.editAtt', compact('att'));
    }

    public function updateAtt(ProductAtributeRequest $request,$id)
    {
        $att = Attribute::find($id);
        $att->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Sửa thông số kỹ thuật id '.$id,
            'object' => 'thong-so-ky-thuat',
        ]);
        
        return redirect('admin/san-pham/sua-thuoc-tinh/'.$id)->with('thongbao','Sửa thuộc tính thành công');
    }

}
