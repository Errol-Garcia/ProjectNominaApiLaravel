<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function index(){
        $session = Session::get();
        return view('');
    }
    
    public function create(){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/user');
        $session = $response->json()["data"];
        
        //$session = Session::get();
        return view('',['session'=> $session]);
    }
    public function store(Request $request){
        
        $url = env('URL_SERVER_API');

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'user' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'password' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'identification_card' => 'required|regex:/^([0-9]*)$/|between:8,11',
        ]);

        $response = Http::post($url . '/user',[
            'name'=> $request->name,
            'user'=> $request->user,
            'password'=> $request->password,
            'identification_card'=> $request->identification_card,
            'role_id'=> $request->role_id,
        ]);
        return redirect()->route('empleado.index');
    }
    public function show(){
    }
    public function edit(Session $session){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/user/'.$session->id);
        $session = $response->json()["data"];
        
        //$session = Session::find($session->id);
        return view('',['session'=> $session]);
    }
    public function update(Request $request, Session $session){
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'user' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'password' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'identification_card' => 'required|regex:/^([0-9]*)$/|between:8,11',
        ]);

        $session->update([
            'name'=> $request->name,
            'user'=> $request->user,
            'password'=> $request->password,
            'identification_card'=> $request->identification_card,
            'role_id'=> $request->role_id,
        ]);

        return redirect()->route('session.index');
    }
    public function destroy(User $user){
        
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . '/v1/user/'.$user->id);
        
        if($response->successful()){
            return redirect()->route('session.index')->with(['message'=> 'usuario actualizado correctamente']);
        }else{
            return redirect()->route('session.index')->withErrors(['message'=> 'Error al actualizar el usuario']);
        }
    }
}