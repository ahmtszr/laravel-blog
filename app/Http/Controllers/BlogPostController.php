<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\PostRequest;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = BlogPost::all(); //fetch all blog posts from DB
        return view('blog.index',compact('posts')); //returns the fetched posts
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id = 0)
    {
       $posts=BlogPost::where('id', $id)->first();
       if(!$posts){
           echo 'sayfa bulunamadı';
       }
       else

        return view('blog.show',compact('posts'));  //returns the view with the post
    }

    public function about_us()
    {
        return view('blog.about-us');
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

        $message= new Contact;
        $message->name=$data['name'];
        $message->email=$data['email'];
        $message->message=$data['message'];

        $message->save();

        return redirect('contact')->with('success','Mesajınız başarıyla gönderildi');


    }

}
