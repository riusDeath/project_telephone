<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getDangNhapAdmin()
	{
		if (Auth::check()) {
			return redirect()->route('admin');
		} else {
			return view('login.index');
		}
	}



	public function postDangNhapAdmin(Request $request)
	{

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {			
			return redirect('admin');
		} else {
			
			return redirect('admin/dangnhap')->with('thongbao', 'dang nhap khong thanh cong');
		}
	}

	function getDangXuatAdmin()
	{
		Auth::logout();
		
		return redirect('admin/dangnhap');
	}


}
