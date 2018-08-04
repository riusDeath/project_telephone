<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Ship;
use App\Models\list_image;
use App\Mail\OrderShipped;
use App\Mail\OrderAdmin;
use Mail;
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

        Cart::add($id, $product->name, 1, $product->price, ['image' => $product->image , 'options' => 1]);
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
        $order->user_id = Auth::id();
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
                'options_id' => $cart->options['options'],
            ]);
            $product = Product::find($cart->id);
            $product->total = $product->total - $cart->qty;
            $product->save();
            

            try {
                $list_image = list_image::find($cart->options['options']);

                if (isset($list_image)) {
                    $list_image->total = $list_image->total - $cart->qty;
                    $list_image->save();
                }
                
            } catch (Exception $e) {
                //
            }
        }

        Mail::to(Auth::user()->email, Auth::user()->name)->send(new OrderShipped($order, Cart::content()));
        $admins = User::where('grade', 'admin')->orWhere('grade', 'boss')->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email, $admin->name)->send(new OrderAdmin($order, Cart::content()));
        }

        Cart::destroy();

        return redirect('cart/viewOrder');     
    }
    
}
