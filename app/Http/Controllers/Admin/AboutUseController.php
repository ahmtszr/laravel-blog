<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Support\Facades\DB;

class AboutUseController extends Controller
{

    public function about_us()
    {
        $about_us=AboutUs::first();
        return view('admin.about.about-us',compact('about_us'));
    }

    public function edit()
    {
        $about_us=AboutUs::first();
        return view('admin.about.about-us-edit',compact('about_us'));
    }

    public function update(AboutUsRequest $request)
    {
        $data=$request->validated();

        $about_us=AboutUs::first();
        $about_us->title=$data['title'];
        $about_us->description=$data['description'];

        $about_us->update();

        return redirect('admin/about-us')->with('message','Değişiklikler başarıyla kaydedildi.');
    }
}
