<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order ;
use App\Models\OrderDetail ;
use App\Models\Pay;
use App\Models\Ship;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PayRequest;
use App\Http\Requests\ShipRequest;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(6);

        return view('admin.order.index', compact('orders'));
    }

    public function indexSearch()
    {
        $orders = Order::search()->orderBy('id', 'desc')->paginate(6)
                ->appends('search', request()->search);

        return view('admin.order.index',compact('orders'));
    }

    public function detail($id)
    {
        if ($order = Order::findOrFail($id)) {
            $detail = OrderDetail::search($id)->get();

            return view('admin.order.detail', compact('detail','order'));
        } 
        
        return '404 not Found';     	
    }

     public function userOrders($id)
    {
        $orders = Order::searchUser($id)->paginate(5);
     
        return view('admin.order.index1');
    }

    public function method()
    {
        $pays = Pay::all();

        return view('admin.order.method', compact('pays'));
    }

    public function pay(PayRequest $request)
    {
        Pay::create($request->all());

        return redirect('admin/pay')
                ->with('mess', trans('admin.add_successfully')) ;
    }

    public function ship()
    {
        $ships= Ship::all();

        return view('admin.order.ship', compact('ships'));
    }

    public function newShip(ShipRequest $request)
    {
        Ship::create($request->all());

        return redirect('admin/ship')
                ->with('mess', trans('admin.update_successfully')) ;
    }

    public function approved($id)
    {
        $order = Order::find($id);
        
        if ($order->status == 0) {
          $order->status = 1;
        } else {
            $order->status =2;
        }
        $order->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Approved id: '.$id,
            'object' => 'order',
        ]);

        return redirect()->back();
    }

    public function editPay($id)
    {
        $pay= Pay::find($id)->first();

        return view ('admin.order.editPay', compact('pay'));
    }

    public function updatePay(Request $request,$id)
    {
        $pay= Pay::find($id);
        $pay->name = $request->name;
        $pay->description = $request->description;
        $pay->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'update pay: '.$id,
            'object' => 'pay',
        ]);

        return redirect('admin/method/editPay/'.$id)
                ->with('mess', trans('admin.update_successfully')) ;

    }

    public function editShip($id)
    {
        $ship= Ship::find($id);

        return view ('admin.order.editShip', compact('ship'));
    }

    public function updateShip( ShipRequest $request, $id)
    {
        $ship= Ship::find($id);
        $ship->update($request->all());
        $ship->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Update ship: '.$id,
            'object' => 'ship',
        ]);

        return redirect('admin/method/updateShip/'.$id)->with('mess', trans('admin.update_successfully')) ;
    }

    public function deletePay($id)
    {
        if ($pay = Pay::findOrFail($id)) {
            if ($pay->status == 1) {
                $pay->status = 0;
            } else {
                $pay->status = 1;
            }                      
            $pay->save();
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 'change status pay: '.$id,
                'object' => 'pay',
            ]);

            return redirect('admin/method/pay');
        } 

        return  '404 Error';
    }

    public function deleteShip($id)
    {
        if ($ship = Ship::findOrFail($id)) {
            if ($ship->status == 1) {
                $ship->status = 0;
            } else {
                $ship->status = 1;
            }
            $ship->save();
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 'change status ship: '.$id,
                'object' => 'ship',
            ]);

            return redirect('admin/method/ship');
        } 
        
        return  '404 Error';
    }
    
}
