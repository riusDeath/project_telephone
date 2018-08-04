<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassWord;
use App\Models\User;
use Mail;

class ResetPasswordController extends Controller
{
    public function  resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

    	if (isset($user)) {
            Mail::to($user->email, $user->name)->send(new ResetPassWord($user));
        	$mess = trans('passwords.sent');
    	} else {
            $mess = trans('passwords.user');   
        }

    	return response()->json(compact('mess'));
    }
}
