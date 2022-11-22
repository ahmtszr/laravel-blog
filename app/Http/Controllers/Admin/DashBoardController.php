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

    public function about_us()
    {
        return view('admin.about-us');
    }

    public function create()
    {
        return view('admin.about-us');
    }

    public function store(AboutUsRequest $request)
    {
        $data=$request->validated();

        $about_us =new AboutUs;
        $about_us->title=$data['title'];
        $about_us->description=$data['description'];

        $about_us->save();

        return redirect('admin/about-us')->with('success');
    }

}
