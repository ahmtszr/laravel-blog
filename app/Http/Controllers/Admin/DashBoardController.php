<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\BlogPost;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function contact()
    {
        $message=Contact::all('id','name','email','message');
        return view('admin.contact.contact',compact('message'));
    }

    public function create()
    {
        return view('admin.about.about-us');
    }

    public function deleteContact($id)
    {
        $contact= Contact::find($id);
        if ($contact)
        {
            $contact->delete();
            return redirect('/admin/contact')->with('message','Mesaj başarıyla silindi!');
        }
        else
            return redirect('/admin/contact')->with('error','Mesaj id bulunamadı!');
    }

}
