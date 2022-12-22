<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\AboutUs;
use App\Models\BlogPost;
use App\Models\Contact;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = BlogPost::paginate(3); //fetch all blog posts from DB
        return view('blog.index',compact('posts')); //returns the fetched posts
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id = 0)
    {
        $posts = BlogPost::where('id', $id)->first();
        return view('blog.show',compact('posts')); //returns the fetched posts
    }

    public function about_us()
    {
        $about_us=AboutUs::first();
        return view('blog.about-us',compact('about_us'));
    }

    public function contact()
    {
        return view('blog.contact');
    }

    public function create()
    {
        return view('blog.contact');
    }

    public function store(ContactRequest $request)
    {
        $data=$request->validated();

            $message = new Contact;
            $message->name = $data['name'];
            $message->email = $data['email'];
            $message->message = $data['message'];
            $message->save();
            return redirect('contact')->with('message', 'Mesajınız başarıyla gönderildi');
    }

}
