<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\code_discount;
use App\Models\User;
use App\Models\Order;
use Mail;
use DB;
use App\Mail\CodeDiscount;

class CodeController extends Controller
{
   	public function index()
   	{
   		$code_discounts = code_discount::search()
        ->orderBy('id', 'desc')
        ->paginate(12);
        
   		return view('admin.code_discount.index', compact('code_discounts'));
   	}

   	public function add(Request $request)
   	{
        if ($request->sort) {
   		    $orders = Order::distinct()->select('user_id')->get();    
            $users=[];
            foreach ($orders as  $value) {
                 $users[] = $value->user;
            }       
        } else {
            $user = User::select()->orderBy('id', 'desc')->get();
        }
        
        return view('admin.code_discount.create', compact('users'));
   	}

   	public function create(Request $request)
   	{  		
        if ($request->select_user == 1) {
            $users = User::inRandomOrder()->take($request->total)->get();

            foreach ($users as $user) {
                $code = rand();
                $code_discount = code_discount::create([
                    'code' => $code,
                    'sale' => $request->sale,
                    'date_end' => $request->date_end,
                    'date_create' => $request->date_create,
                    'mail' => $user->mail,
                ]);
                Mail::to($user->email, $user->name)
                ->send(new CodeDiscount($code_discount));
            }
        } else {
            $email = explode(' ', $request->email);
            var_dump($email);

            for ($i=0; $i < count($email); $i++) {
                $code = rand();
                $code_discount = code_discount::create([
                    'code' => $code,
                    'sale' => $request->sale,
                    'date_end' => $request->date_end,
                    'date_create' => $request->date_create,
                    'mail' => $email[$i],
                ]);
                $address = $email[$i];
                Mail::to($address, "")->send(new CodeDiscount($code_discount));
            }
        }

        if ($request->add_more == "on") {
            return redirect()->back();
        } 

        return redirect('admin/code_discount');
                
   	}	

    public function change($id)
    {
        $code_discount = code_discount::findOrFail($id);

        if ($code_discount->status == 0) {
            $code_discount->status = 1;
        } else {
            $code_discount->status = 0;
        }
        $code_discount->save();

        
        return redirect()->back();
    }
}