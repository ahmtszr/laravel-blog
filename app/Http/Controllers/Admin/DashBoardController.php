<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\Contact;
use Illuminate\Http\Request;

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


}
