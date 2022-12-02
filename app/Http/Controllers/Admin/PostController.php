<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\BlogPost;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class PostController extends Controller
{

    public function index()
    {
        $posts=BlogPost::all('id','title','user_id');

        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function edit($post_id)
    {
        $post=BlogPost::find($post_id);
        return view('admin.post.edit',compact('post'));
    }

    public function store(PostRequest $request)
    {
        $data=$request->validated();

        $post=new BlogPost;
        $post->title=$data['title'];
        $post->body=$data['body'];
        $post->user_id=Auth::user()->id;

        if (!$request->hasFile('picture'))
        {
            return back()->with('error','Missing image!');
        }
        else
        {
            $file = $request->file('picture');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pictures'), $filename);
            $post->picture = $filename;
        }
        $post->save();
        return redirect('admin/posts')->with('message','Post başarıyla eklendi');
    }

    public function update(PostRequest $request, $post_id)
    {
        $data=$request->validated();

        $post=BlogPost::find($post_id);
        $post->title = $data['title'];
        $post->body = $data['body'];

        if ($request->hasFile('picture')){

            $destination='pictures/'.$post->picture;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file=$request->file('picture');
            $filename=rand().'.'.$file->getClientOriginalExtension();
            $file->move('pictures/',$filename);
            $post->picture=$filename;
        }
        $post->update();

        return redirect('admin/posts')->with('message','Değişiklikler başarıyla eklendi');

    }
    public function destroy($post_id)
    {
        $posts=BlogPost::find($post_id);
        if ($posts)
        {
            $destination='pictures/'.$posts->picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $posts->delete();
            return redirect('admin/posts')->with('warning','');
        }
        else
            return redirect('admin/posts')->with('error','Post id bulunamadı');
    }



}
