<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all('id','name','email','user_name','role_as');
        return view('admin.users.index',compact('users'));
    }
    public function destroy($id)
    {
        $users=User::find($id);
        if ($users)
        {
            $users->delete();
            return redirect('admin/users')->with('success','Kullanıcı başarıyla silindi!');
        }
        else
            return redirect('admin/users')->with('message','Bu id\'ye sahip kullanıcı bulunamadı!');
    }
}
