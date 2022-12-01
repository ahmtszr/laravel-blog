<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
    public function destroy($id)
    {
        $users=User::find($id);
        if ($users)
        {
            $users->delete();
            return redirect('admin/users')->with('warning','');
        }
        else
            return redirect('admin/users')->with('message','Bu id\'ye sahip kullanıcı bulunamadı!');
    }
}
