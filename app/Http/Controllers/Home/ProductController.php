<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slide;
use App\Models\Comment;
use App\Models\Rate;
use App\Models\User;
use App\Models\list_image;
use App\Models\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ProductController extends Controller
{
    
    public function home()
    {
        $products = Product::search()->where('status','1')->orderBy('id','desc')->paginate(12);      

        return view('display.product.index',compact('products'));
    }

    public function sort($sort, Request $request)
    {
        $products = Product::select()->where('status','1')->orderBy('price',$request->sort)->get();

        return response()->json(compact('products'));
    }

    public function views($id)
    {
        if ($product = Product::findorfail($id)) {     
            $product->view += 1;
            $product->save();
            $products = Product::select()->where('category_id',$product->category_id)->paginate(6);
            $product_brand = Product::select()->where('brand_id',$product->brand_id)->paginate(6);
            $rate_one = Product::find($id)->rates()->where('rate',1)->count();
            $rate_tow = Product::find($id)->rates()->where('rate',2)->count();
            $rate_three = Product::find($id)->rates()->where('rate',3)->count();
            $rate_four = Product::find($id)->rates()->where('rate',4)->count();
            $rate_five = Product::find($id)->rates()->where('rate',5)->count();
            $rate_total = Product::find($id)->rates()->count();
            $types = Attribute::select('types')->groupBy('types')->get();
            $comments = Product::find($id)->comments()->where('comment_style', 0)->paginate(12);

            return view('display.product.view', compact('product', 'types', 'products', 'product_brand', 'rate_one', 'rate_tow', 'rate_three', 'rate_four', 'rate_five', 'rate_total', 'comments'));
        } 
     
    }

    public function product_category($category_id)
    {
        $category = Category::find($category_id);
        $mess = $category->name;
        $slides = Slide::where('name', 'product');
        $ids = [];
        array_push($ids, $category_id);       
        $cat_con = Category::where('parent', $category_id)->get();

        if ($cat_con->count()) {
            foreach ( $cat_con as $con) {
                array_push($ids, $con->id);
            }
        }
        $products = Product::where('status', '1')->whereIn('category_id', $ids)->paginate(12)->appends('category_id', $category_id);

        return view('display.index',compact('products', 'slides', 'mess'));
    }

    public function product_brand($brand_id)
    {
        $slides = Slide::where('name', 'product');
        $brand = Brand::find($brand_id);
        $mess = $brand->name;
        $products = Product::where('status', '1')->productBrand($brand_id)->paginate(12)->appends('brand_id', $brand_id);

        return view('display.index',compact('products','slides','mess'));
    }

    public function product_price(Request $request)
    {
        $slides = Slide::where('name', 'product')->get();
        $products = Product::productPrice()->where('status', '1')->paginate(12)->appends(['value_min' => $request->value_min, 'value_max'=> $request->value_max]);

        return view('display.index',compact('products', 'slides'));
    
    }

    public function product_start(Request $request)
    {
        if (!empty($request->rate)) {
            $total = 0;
            $dem = 0;
            foreach ($request->rate as $rate) {
                $total +=  $rate;
                $dem++;
            }
            $avg= $total/$dem;
            $slides = Slide::where('name', 'product')->get();   
            $products = Product::where('avg_rate', '>=', $avg)->paginate(12)->appends('rate', $request->rate);

            return view('display.index',compact('products', 'slides'));
        }
       
    }

    public function addComment(Request $request, $id)
    {
        Comment::create([
            'product_id' => $id,
            'comment' => $request->comment,
            'comment_style' => isset($request->comment_id)?$request->comment_id:0,
            'user_id' => Auth::user()->id,
        ]); 
        $comments = Product::find($id)->comments()->where('comment_style', 0)->get();

        return response()->json(compact('comments'));
    }

    public function addRate(Request $request, $id)
    {            
        $this->validate($request, [
            'rate' => 'required',
        ], [
            'rate.required' => ' Chọn rate ',
        ]);

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $rate= Rate::where(['product_id' => $id, 'user_id' => $user_id])->first();

            if (!$rate ) {
                Rate::create([
                    'rate' => $request->rate,
                    'product_id' => $id,
                    'user_id' => $user_id,
                ]);
            } else {
                $rate->rate = $request->rate;
                $rate->save();                  
            }

            $product= Product::find($id);
            $product->avg_rate = $product->rate_avg1();
            $product->save();
            $avg_rate = $product->rate_avg1();
            echo  "<h1 class='ajax_rate_avg'>".$avg_rate."<i class='fa fa-star'></i></h1>";
        } else {
            echo  0;
        }
            
    }

    public function total_list_image($val)
    {
        $total = list_image::select('total')->where('id', $val)->first();
        return $total;
    }
    
}
