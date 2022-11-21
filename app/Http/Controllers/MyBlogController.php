<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MyBlogController extends Controller
{

    public function index()
    {
        $posts=BlogPost::where('user_id',Auth::user()->id)->get();
        return view('blog.my-blog',compact('posts'));
    }

    public function show($id = 0)
    {
        $posts=BlogPost::where('id', $id)->first();
        if(!$posts){
            echo 'sayfa bulunamadı';
        }
        else

            return view('admin.users.show',compact('posts'));  //returns the view with the post
    }

    public function edit($post_id)
    {
        $posts = BlogPost::find($post_id);
        return view('admin.users.edit',compact('posts'));
    }

    public function update(PostRequest $request,$id)
    {
        $data=$request->validated();

        $posts=BlogPost::find($id);
        $posts->title = $data['title'];
        $posts->body = $data['body'];

        if ($request->hasFile('picture')){

            $destination='pictures/'.$posts->picture;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('pictures/',$filename);
            $posts->picture=$filename;
        }
        $posts->update();
        return redirect('/my-blog')->with('success','Post başarıyla güncellendi!');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(PostRequest $request)
    {
        $data=$request->validated();

        $posts=new BlogPost;
        $posts->title=$data['title'];
        $posts->body=$data['body'];
        $posts->user_id=Auth::user()->id;

        if (!$request->hasFile('picture'))
        {
            return back()->with('error','Missing image!');
        }
        else
        {
            $file = $request->file('picture');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pictures'), $filename);
            $posts->picture = $filename;
        }
        $posts->save();
        return redirect('/my-blog')->with('success','Post başarıyla eklendi');
    }
    public function destroy($id)
    {
        $posts= BlogPost::find($id);
        if ($posts)
        {
            $destination='pictures/'.$posts->picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $posts->delete();
            return redirect('/my-blog')->with('success','Post başarıyla silindi!');
        }
        else
            return redirect('/my-blog')->with('message','Post id bulunamadı!');
    }
}
