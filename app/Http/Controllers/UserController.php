<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getLoginAdmin()
	{
		if (Auth::check()) {
			if (Auth::user()->grade == "admin" || Auth::user()->grade == "boss" && Auth::user()->status == 1) {
				return redirect()->route('admin');
			} 
			
			return view('login.index');			
		} 
			
		return view('login.index');
	}

	public function postLoginAdmin(Request $request)
	{

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {	

			return redirect('admin');
		} 
			
		return redirect('admin/login')->with('mess', 'Access not sucessful');
	}

	function logoutAdmin()
	{
		Auth::logout();
		
		return redirect('/');
	}

}
