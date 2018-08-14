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
use App\Models\Comment;
use App\Models\Sale;
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
            } else if ($request->sort == 2) {
                    $products =  Product::select()
                    ->orderBy('avg_rate', 'desc')
                    ->paginate(12)
                    ->appends('sort', $request->sort);          
                }  else {
                    $products =  Product::select()
                    ->where('hot', 1)
                    ->paginate(12)
                    ->appends('sort', $request->hot);
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
    	   
        return redirect('admin/product/');
    }

    public function views($id)
    {
        if ($product = Product::findOrFail($id)) {
            $comments = Comment::where(['product_id' => $id, 'comment_style' => 0])->get();
            $comments_child = Comment::where('product_id', $id)
            ->where('comment_style', '<>', 0)
            ->get();

            return view('admin.product.views', compact('product', 'comments', 'comments_child'));
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
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->save();       
        $product = Product::find($id);
        $Brands = Brand::all();
        $categoris = Category::all();
        $warranty_periods = warranty_period::all();

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

        return redirect()->back();
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
        
        return redirect('admin/product/proAtt/'.$id)->with('mess', trans('admin.add_successfully')) ;
        
    }

    public function addAtt(ProductAtributeRequest $request)
    {
        Attribute::create($request->all());

        return redirect('admin/product/attributes/')->with('mess', trans('admin.add_successfully')) ;

    }

    public function exitAtt($id)
    {
        $att= Attribute::findOrFail($id);
        $att->delete();

        return redirect('admin/product/attributes/');
    }

    public function editAtt($id)
    {       
        $att= Attribute::findOrFail($id);

        return view('admin.product.editAtt', compact('att'));
    }

    public function updateAtt(ProductAtributeRequest $request,$id)
    {
        $att = Attribute::findOrFail($id);
        $att->update($request->all());
        
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
        $product = Product::findOrFail($id);

        if ($list_images = Product::findOrFail($id)->list_images()->get()) {
            return view('admin.product.list_images', compact('list_images', 'product'));
        } 
        
        return '404 Not Found';       
    }

    public function delete_list_images($id)
    {
        list_image::findOrFail($id)->delete();

        return redirect()->back();
    }
    
}
