<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::get();
        return view('configuration.post.PostList',
        ['post' => $post]);
    }
    public function create(){
        $post = Post::get();
        return view('configuration.post.PostCreate',
        ['post'=> null]);

    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        Post::create([
            'name'=> $request->name
        ]);

        return redirect()->route('post.index');

    }
    public function show(){
    }
    public function edit(Post $post){
        $post = Post::find($post->id);
        return view('configuration.post.PostUpdating',
            ['post'=> $post]);
    }
    public function update(Request $request, Post $post){
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',]);

            $post->update([
                'name'=> $request->name
            ]);

            return redirect()->route('post.index');
    }
    public function destroy(Post $post){

        $post = Post::find($post->id);
        $post->delete();
        return redirect()->route('post.index');

    }

}