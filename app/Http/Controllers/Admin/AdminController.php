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
        $admins =  User::select()->where('grade', '=', 'boss')->orWhere('grade', '=', 'admin')->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function edit($id)
    {
        if ($admin = User::findOrFail($id)) {
            return view('admin.admins.edit', compact('admin'));           
        } else {
            echo "404 Not Found";
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

        return redirect('admin/sua-thong-tin-admin/'.$id)->with('thongbao', 'Sửa thông tin thành công');
    }

    public function delete($id)
    {
        $user = User::find($id);
        
        if ($user->grade == 'boss') {
            return redirect('admin/danh-sach-admin')->with('thongbao', 'Bạn không có quyền xóa boss');
        } else {
            $user->status = 0;
            $user->save();

            return redirect('admin/danh-sach-admin');
        }
                    
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
            'action' => 'Tạo người dùng ',
            'object' => 'nguoi-dung',
        ]);

        return view('admin.admins.create')->with('thongbao', 'Tạo mới thành công');
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

        if ($user->email == $request->email_confrim) {

            if ($request->changePassword == 'on') {     
                $request->merge([
                    'password' => bcrypt($request->password),
                ]); 
                $user->update($request->all());        
                $user->save();
            }
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 'Sửa thông tin người dùng: '.$id,
                'object' => 'nguoi-dung',
            ]);
            return redirect('admin/danh-sach-admin')->with('thongbao', 'Bạn đã sửa thành công');
        } else {
            return redirect('admin/danh-sach-admin')->with('thongbao', 'Bạn đã sửa thành công');
        }                
    }

    
}
