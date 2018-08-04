<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;


class AdminController extends Controller
{
   public function index()
    {
        $admins =  User::select()->where('grade', '=', 'boss')
                    ->orWhere('grade', '=', 'admin')->get();

        return view('admin.admins.index', compact('admins'));
    }

    public function edit($id)
    {
        if ($admin = User::findOrFail($id)) {

            return view('admin.admins.edit', compact('admin'));           
        } 
        
        return '404 Not Found';
    }

    public function update(UserRequest $request, $id)
    {
        if ($user = User::findOrFail($id)) {
            if ($request->changePassword == 'on') {     
                $request->merge([
                    'password' => bcrypt($request->password),
                ]); 
            }
            $user->update($request->all());
            $user->save();

            return redirect('admin/update-admin/'.$id)->with('mess', trans('admin.update_successfully')) ;
        } 

    }

    public function delete($id)
    {
        if ($user = User::findOrFail($id)) {           
            $user->status = 0;
            $user->save();

            return redirect('admin/list-admin');
        } 

        return '404 Not Found';
                    
    }

    public function add()
    {
        return view('admin.admins.create');
    }

    public function create(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
        ]);
        User::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'create user',
            'object' => 'user',
        ]);

        return view('admin.admins.create')->with('mess', trans('admin.add_successfully')) ;
    }

    public function views()
    {
        $user_login = Auth::user();

        $data['user_login'] = $user_login;

        return view('admin.admins.views', $data);
    }

    public function updateViews(UserRequest $request, $id)
    {

        $user = User::find($id);

        if ($request->changePassword == 'on') {     
            $request->merge([
                'password' => bcrypt($request->password),
            ]); 
            $user->update($request->all());        
            $user->save();
        }                 
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 'update user id : '.$id,
            'object' => 'user',
        ]);

        return redirect('admin/list-admin')->with('mess', trans('admin.update_successfully')) ;
    }
    
}
