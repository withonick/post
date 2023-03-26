<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('index', ['posts' => Post::all()]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'max: 100 | required',
            'text' => 'max: 280',
            'image' => 'image | mimes:jpg,png,jpeg,gif,svg|max:4080|dimensions:min_width=200,min_height=200,max_width=7000,max_height=7000',
        ]);
        if($request->image){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('posts', $fileName, 'public');
            $validated['image'] = '/storage/'.$image_path;
        }

        Post::create($validated);

        return back();
    }


    public function show(Post $post)
    {
        return view('show', ["post" => $post->load('comments')]);
    }


    public function update(Request $request,Post $post){
        $validated = $request->validate([
            'title' => 'max: 100 | required',
            'text' => 'max: 280',
            'image' => 'image | mimes:jpg,png,jpeg,gif,svg|max:4080|dimensions:min_width=200,min_height=200,max_width=7000,max_height=7000',
        ]);
        if($request->image){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('posts', $fileName, 'public');
            $validated['image'] = '/storage/'.$image_path;
        }

        $post->update($validated);

        return back();
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }
}
