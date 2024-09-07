<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog-post', ['post'=> $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $inputs = request()->validate([
            'title'=> 'required|min:25|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        Session::flash('post-created-message', 'post is created');
        return redirect()->route('post.index');
    }

    public function index()
    {
//        $posts = Post::all();
        $posts = Auth()->user()->posts()->paginate(3);
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title'=> 'required|min:25|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $this->authorize('update', $post);
        $post->save();
        Session::flash('post-updated-message', 'post is updated');
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('message', 'post is deleted');
        return back();
    }

}
