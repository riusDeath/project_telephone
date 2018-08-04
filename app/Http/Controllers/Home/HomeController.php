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
        $products = Product::search()->orderBy('id', 'desc')->paginate(12);   
         	
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

    public function sign()
    {
        return redirect()->back();
    }

    public function resetPassword()
    {
        return view('login.reset');
    }

    public function verify()
    {
        return view('auth.passwords.reset');
    }

    public function updatePassword(Request $request)
    {
        $this->validate( $request, [
            'password' => 'min:6|max:32',
            'password_confirmation' => 'same:password',
        ], [
            'password_confirmation.same' => 'Enter password not match',
            'password.min' => 'password min 6 chars',
            'password.max' => 'password max 32chars',
        ]);

        $user = User::where('email', $request->email)->first();

        if (isset($user)) {
           $user->password = bcrypt($request->password);
            $user->save();

            return view('auth.login');
        }    
    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();

        return redirect('/');
    }

    public function cart(Request $request, $id)
    {
        $this->validate($request,[
            'total' => 'min:1',
        ],[
            'total.min' => 'total > 0',
        ]);
        $product = Product::find($id);
        $qty = $request->total;

        if ($qty > 0) {
            foreach ($product->attribute as $att) {
            if (isset($request->$att))
                $option = [$request->$att];
            }

            if ($product->price_sale == 0) {
                Cart::add($id, $product->name, $qty,$product->price, ['image' => $product->image, 'options' => isset($request->color)?$request->color:1]);  
            } else {
                Cart::add($id, $product->name, $qty,$product->price_sale, ['image' => $product->image, 'options' => isset($request->color)?$request->color:1]);  
            }

            return redirect()->route('viewOrder'); 
        } 

        return redirect('/');           
    }

    public function viewOrder()
    {
        return view('display.order.orderDetail');       
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back(); 
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
        } 

        return 'loi';
    }

}
