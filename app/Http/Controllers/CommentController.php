<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'username' => 'max: 100 | required',
            'text' => 'max: 280',
            'image' => 'image | mimes:jpg,png,jpeg,gif,svg|max:4080|dimensions:min_width=200,min_height=200,max_width=7000,max_height=7000',
        ]);
        if($request->image){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('commentImages', $fileName, 'public');
            $validated['image'] = '/storage/'.$image_path;
        }

        $post->comments()->create($validated);

        return back();
    }


    function edit(Comment $comment){
        return view('edit',compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $post = $comment->post;

        $validated = $request->validate([
            'username' => 'max: 100 | required',
            'text' => 'max: 280',
            'image' => 'image | mimes:jpg,png,jpeg,gif,svg|max:4080|dimensions:min_width=200,min_height=200,max_width=7000,max_height=7000',
        ]);
        if($request->image){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('commentImages', $fileName, 'public');
            $validated['image'] = '/storage/'.$image_path;
        }

        $comment->update($validated);

        return redirect()->route('posts.show', [$post]);
    }

    function delete(Comment $comment){
        $comment->delete();
        return back();
    }
}
