<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index(){

        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/post');
        $post = $response->json()["data"];

        return view('configuration.post.PostList',
        ['post' => $post]);
    }
    public function create(){
        return view('configuration.post.PostCreate',
        ['post'=> null]);

    }
    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        $response = Http::post($url . '/v1/post',[
            'name'=> $request->name
        ]);

        if($response->successful()){
            return redirect()->route('post.index')->with(['message'=> 'Cargo agregado correctamente']);
        }else{
            return redirect()->route('post.index')->withErrors(['message'=> 'Error al registrar al Cargo']);
        }
    }
    public function show(){
    }
    public function edit(int $post){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/post/'.$post);
        $post = $response->json()["data"];
        
        //$post = Post::find($post->id);
        return view('configuration.post.PostUpdating',
            ['post'=> $post]);
    }
    public function update(Request $request, int $id){
        $url = env('URL_SERVER_API');
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',]);

            $response = Http::put($url . '/v1/post/'.$id,[
                'name'=> $request->name
            ]);

            if($response->successful()){
                return redirect()->route('post.index')->with(['message'=> 'Cargo actualizado correctamente']);
            }else{
                return redirect()->route('post.index')->withErrors(['message'=> 'Error al actualizar el Cargo']);
            }
    }
    public function destroy(int $post){
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . '/v1/post/'.$post);
        
        if($response->successful()){
            return redirect()->route('post.index')->with(['message'=> 'Cargo actualizado correctamente']);
        }else{
            return redirect()->route('post.index')->withErrors(['message'=> 'Error al actualizar el Cargo']);
        }

    }

}