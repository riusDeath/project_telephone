<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Slide;
use App\Models\Pay;
use App\Models\Attribute;
use App\Models\warranty_period;
use App\Models\Ship;
use App\Models\Location;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    function index()
    {
        $slides = Slide::where('name', 'product');
    	$products = Product::search()->orderBy('id', 'desc')->paginate(3);   
         	
    	return view('display.index',compact('products', 'slides'));
    }

    public function sign_up()
    {
    	return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

     public function logout()
    {
        Auth::logout();
        Cart::destroy();

        return redirect('home');
    }

    public function cart(Request $request, $id)
    {
        $this->validate($request,[
            'total' => 'min:1',
        ],[
            'total.min' => 'Số lượng sản phẩm phải lớn hơn 0',
        ]);
        $product = Product::find($id);
        $qty = $request->total;

        if ($qty >0) {
            foreach ($product->attribute as $att) {
            if (isset($request->$att))
                $option = [$request->$att];
            }

            if ($product->price_sale == 0) {
                Cart::add($id,  $product->name, $qty,$product->price,['image' => $product->image ]);  
            } else {
                Cart::add($id,  $product->name, $qty,$product->price_sale,['image' => $product->image ]);  
            }

            return redirect()->route('xem-don-hang'); 
        } else {
            return redirect('home');
        }
        

           
    }

    public function viewOrder()
    {
        return view('display.order.orderDetail');       
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('xem-don-hang'); 
    }

    public function checkout()
    {
        $ships = Ship::all();
        $pays = Pay::all();
        $locations = Location::all();
        $provinces = Province::all();
        $attributes = Attribute::all();
        $wars = warranty_period::all();

        return view('display.order.checkout',compact('ships','pays','attributes','locations','provinces','wars'));
    }

    public function editQty(Request $request, $rowId)
    {
        $qty = (int) $request->qty;
        Cart::get($rowId);
        $product = Product::find(Cart::get($rowId)->id);    
        if ( $qty!=0 && $qty <= $product->total && Cart::get($rowId)) {
            Cart::update($rowId, $qty);
            $carts = Cart::content();
            return response()->json(compact('carts'));
        } else {
            echo "loi";
        }
    }

}