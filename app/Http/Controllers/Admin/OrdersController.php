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
        $orders = Order::search()->orderBy('id', 'desc')->paginate(6)->appends('search', request()->search);

        return view('admin.order.index',compact('orders'));
    }

    public function detail($id)
    {
    	$order = Order::find($id);
     	$detail = OrderDetail::search($id)->get();

    	return view('admin.order.detail', compact('detail','order'));
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

    public function ajaxPays($id)
    {
        $pay= Pay::find($id);
        echo "
            <p>$pay->name</p>
        " ;
    }

    public function pay(PayRequest $request)
    {
        Pay::create($request->all());

        return redirect('admin/phuong-thuc-thanh-toan')->with('thongbao', 'Thêm mới thành công');
    }

    public function ship()
    {
        $ships= Ship::all();

        return view('admin.order.ship', compact('ships'));
    }

    public function newShip(ShipRequest $request)
    {
        Ship::create($request->all());

        return redirect('admin/phuong-thuc-giao-hang')->with('thongbao', 'Thêm mới thành công');
    }

    public function duyet($id)
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
            'action' => 'Duyệt đơn hàng id: '.$id,
            'object' => 'don-hang',
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
            'action' => 'Sửa phương thức thanh toan: '.$id,
            'object' => 'phuong-thuc',
        ]);

        return redirect('admin/phuong-thuc/sua-phuong-thuc-thanh-toan/'.$id)->with('thongbao', 'Sửa phương thức thành công');

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
            'action' => 'Sửa phương thức giao hàng: '.$id,
            'object' => 'phuong-thuc',
        ]);

        return redirect('admin/phuong-thuc/sua-phuong-thuc-giao-hang/'.$id)->with('thongbao','Sửa phương thức thành công');
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
                'action' => 'Sửa trạng thái phương thức thanh toán: '.$id,
                'object' => 'phuong-thuc',
            ]);

            return redirect('admin/phuong-thuc/phuong-thuc-thanh-toan');
        } else {
            echo "404 Error ";
        }
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
                'action' => 'Sửa trạng thái phương thức giao hàng: '.$id,
                'object' => 'phuong-thuc',
            ]);

            return redirect('admin/phuong-thuc/phuong-thuc-giao-hang');
        } else {
            echo "404 Error ";
        }
    }
}
