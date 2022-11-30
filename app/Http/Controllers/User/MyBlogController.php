<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MyBlogController extends Controller
{

    public function index()
    {
        $posts=BlogPost::where('user_id',Auth::user()->id)->get();
        return view('user.my-blog',compact('posts'));
    }

    public function show($id = 0)
    {
        $posts=BlogPost::where('id', $id)->first();
        if(!$posts){
            echo 'sayfa bulunamadı';
        }
        else

            return view('user.show',compact('posts'));  //returns the view with the post
    }

    public function edit($user_id)
    {
        $posts = BlogPost::where('user_id',Auth::user()->id)->find($user_id);

        if ($posts)
        {
            return view('user.edit', compact('posts'));
        }
        else
            return view('errors.404');

    }

    public function update(PostRequest $request, $user_id)
    {
        $data=$request->validated();

        $posts=BlogPost::find($user_id);
        $posts->title = $data['title'];
        $posts->body = $data['body'];

        if ($request->hasFile('picture')){

            $destination='pictures/'.$posts->picture;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file=$request->file('picture');
            $filename=rand().'.'.$file->getClientOriginalExtension();
            $file->move('pictures/',$filename);
            $posts->picture=$filename;
        }
        $posts->update();
        return redirect('/my-blog')->with('message','Post başarıyla güncellendi!');
    }

    public function create()
    {
        return view('user.create');
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
            return back()->with('error','Resim eksik!');
        }
        else
        {
            $file = $request->file('picture');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pictures'), $filename);
            $posts->picture = $filename;
        }
        $posts->save();
        return redirect('/my-blog')->with('message','Postunuz başarıyla eklendi');
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
            return redirect('/my-blog');
        }
        else
            return redirect('/my-blog')->with('error','Post id bulunamadı!');
    }
}
