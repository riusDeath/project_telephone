<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class CustomerController extends Controller
{
    
    public function index()
    {
    	$users = User::search()->orderBy('id', 'desc')->paginate(12);

    	return view('admin.customer.index', compact('users'));
    }
    public function delete($id)
    {
    	$user = User::find($id);
    	if($user->status == 1){
    		$user->status = 0;
    	}else{
    		$user->status =1;
    	}
    	$user->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Thay đổi quyền truy cập khách hàng: '.$id,
            'object' => 'nguoi-dung',
        ]);

    	return redirect()->route('khach-hang');
    }
   
    public function destroy($id)
    {
        if ( $orders = User::find($id)->order) {
            $us = User::find($id);
        
            return view('admin.customer.orderDetail', compact('orders','us'));
        } else {
            echo "404 Erorr not found";
        }
        
    }

    public function edit($id)
    {
        if ($cus = User::findOrFail($id)) {
            return view('admin.customer.edit', compact('cus'));
        } else {
            echo "404 Erorr not found";
        }
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        if ($request->changePassword == 'on') {     
            $request->merge([
                'password' => bcrypt($request->password),
            ]); 
        }
        $user->update($request->all());
        $user->save();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'Sửa thông tin người dùng: '.$id,
            'object' => 'nguoi-dung',
        ]);

        return redirect('admin/khach-hang/sua-ho-so/'.$id)->with('thongbao', 'Sửa thông tin thành công');
    }

}
