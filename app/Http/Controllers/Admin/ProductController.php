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
use App\Models\list_image;
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
            $duoi = $file->getClientOriginalExtension();            
            $file->move('uploads', $filename);
        }
       
        $request->merge([
             'image' => $filename,
        ]);
        $product = Product::create($request->all());
        $id = $product->id;
        $Brands = Brand::all();
        $categoris = Category::all();
        $warranty_periods = warranty_period::all();

        for ($i=0; $i <= $request->dem; $i++) { 
            $c = 'color'.$i;
            $t = 'total'.$i;
            $img = 'image'.$i;
            $fileName = '';

            if ($request->hasFile($img)) {
                $file = $request->file($img);
                $fileName = $file->getClientOriginalName($img);
                $file->move('uploads', $fileName);
            }
            list_image::create([
                'product_id' => $id,
                'color' => $request->$c,
                'total' => $request->$t,
                'image' => $fileName,
            ]);
        }

        if ($request->add_more == 'on') {
            return redirect()->back();
        } 
    	   
        return redirect('admin/san-pham/');
    }

    public function views($id)
    {
        if ($product = Product::findOrFail($id)) {
            return view('admin.product.views', compact('product'));
        } 
            
        return '404 Not Found';
    }

    public function edit($id)
    { 
        $product = Product::findOrFail($id);
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
            'object' => 'product',
        ]);

        return view('admin.product.edit', compact('brands', 'categoris', 'warranty_periods', 'product'))->with('mess', trans('admin.update_successfully')) ;      
    }

    public function att()
    {
        $attributes = Attribute::select()->orderBy('id', 'desc')->paginate(12);

        return view('admin.product.att',compact('attributes'));
    }

    public function product_hot($id, $hot)
    {
        $product = Product::findOrFail($id);
        $product->hot = $hot;
        $product->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'edit product id:'.$id,
            'object' => 'product',
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
        if ( $proAtt = ProductAtt::findOrFail($id)) {
            $proAtt->delete();
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 'delete  Specifications id: '.$prodcut_id,
                'object' => 'Add successfully',
            ]);

            return redirect('admin/product/proAtt/'.$prodcut_id);
        }

        return '404 not found';             
    }

    public function createAtt(Request $request, $id)
    {
        foreach ($request->attribute_id as $attribute_id) {
            $count = ProductAtt::select()
            ->where(['product_id' => $id, 'attribute_id' => $attribute_id ])
            ->count();
            if ($count == 0) {
            ProductAtt::create([
                    'product_id' => $id,
                    'attribute_id' => $attribute_id,
                ]);            
            }
        }

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Add specifications product '.$id,
            'object' => 'Add successfully',
        ]);
        
        return redirect('admin/product/proAtt/'.$id)->with('mess', trans('admin.add_successfully')) ;
        
    }

    public function addAtt(ProductAtributeRequest $request)
    {
        Attribute::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Add specifications ',
            'object' => 'Add specifications',
        ]);

        return redirect('admin/product/attributes/')->with('mess', trans('admin.add_successfully')) ;

    }

    public function exitAtt($id)
    {
        $att= Attribute::find($id);
        $att->delete();

        return redirect('admin/product/attributes/');
    }

    public function editAtt($id)
    {       
        $att= Attribute::find($id);

        return view('admin.product.editAtt', compact('att'));
    }

    public function updateAtt(ProductAtributeRequest $request,$id)
    {
        $att = Attribute::findOrFail($id);
        $att->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Edit specifications id '.$id,
            'object' => 'Add specifications',
        ]);
        
        return redirect('admin/product/editAtt/'.$id)->with('mess', trans('admin.update_successfully')) ;
    }

    public function list_image($id, Request $request)
    {
        for ($i=0; $i <= $request->dem; $i++) { 
            $c = 'color'.$i;
            $t = 'total'.$i;
            $img = 'image'.$i;
            $fileName = '';

            if ($request->hasFile($img)) {
                $file = $request->file($img);
                $fileName = $file->getClientOriginalName($img);
                $file->move('uploads', $fileName);
            }

            $list_image = list_image::select()->where(['product_id' => $id, 'color' => $request->$c ])->first();

            if (!empty($list_image) == 0) {               
                list_image::create([
                    'product_id' => $id,
                    'color' => $request->$c,
                    'total' => $request->$t,
                    'image' => $fileName,
                ]);
            } else {
                $list_image->total = $request->$t;
                $list_image->image = $fileName;
                $list_image->save();
            } 
        }

        return redirect()->back();
    }
     
    public function view_list_images($id)
    {
        $product_id = $id;

        if ($list_images = Product::findOrFail($id)->list_images()->get()) {
            return view('admin.product.list_images', compact('list_images', 'product_id'));
        } 
        
        return '404 Not Found';       
    }

    public function delete_list_images($id)
    {
        list_image::find($id)->delete();

        return redirect()->back();
    }
    
}
