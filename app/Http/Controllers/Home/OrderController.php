<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Ship;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function viewOrders($id)
    {
    	$orders = User::find($id)->order;

    	return view('display.order.destroy',compact('orders'));
    }

    public function add_cart($id)
    {
    	$product = Product::find($id);

    	Cart::add($id, $product->name, 1, $product->price, ['image' => $product->image ]);
    	$carts = Cart::content();
    	
    	return response()->json(compact('carts'));

    }

    public function deleteAll()
    {
        Cart::destroy();
        echo " <section class='main-container col1-layout'><div class='main container'><div class='col-main'><div class='cart'><a href='../'><div style='border:1px solid ; width: 200px  ; height: 100px; margin: 20px auto'  class='text-center' >Mua sắm sản phẩm</div></a></div></div></div></section>";
    }

    public function checkout(Request $request)
    {
        $order = new Order();        
        $order->total = Cart::count();
        $order->price = Cart::subtotal();
        $order->user_id = Auth::user()->id;
        $order->adress = $request->adress;
        $order->phone = $request->phone;
        $order->pay_id = $request->pay;
        $order->ship_id = $request->ship;
        $order->save();
        $id = $order->id; 
        foreach (Cart::content() as $cart) {
            OrderDetail::create([
                'order_id' => $id,
                'product_id' => $cart->id,
                'total' => $cart->qty,
                'price' => $cart->price,
            ]);
            $product = Product::find($cart->id);
            $product->total = $product->total - $cart->qty;
            $product->save();
        }       
        Cart::destroy();
        return view('display.order.orderDetail');     
    }
}
//tiny config