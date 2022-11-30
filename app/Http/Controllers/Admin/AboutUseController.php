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
    public function create()
    {
        return view('admin.about.about-us-create');
    }

    public function store(AboutUsRequest $request)
    {
        $data=$request->validated();

        $about_us=new AboutUs;
        $about_us->title = $data['title'];
        $about_us->description = $data['description'];
        $about_us->save();

        return redirect('admin/about-us')->with('message','Başarıyla eklendi');

    }

    public function edit($about_id)
    {
        $about_us=AboutUs::find($about_id);
        return view('admin.about.about-us-edit',compact('about_us'));
    }

    public function update(AboutUsRequest $request, $about_id)
    {
        $data=$request->validated();

        $about_us=AboutUs::find($about_id);
        $about_us->title = $data['title'];
        $about_us->description = $data['description'];

        $about_us->update();

        return redirect('admin/about-us')->with('message','Değişiklikler başarıyla kaydedildi.');
    }
}
