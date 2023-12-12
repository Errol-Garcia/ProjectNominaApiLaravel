<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        $session = Session::get();
        return view('');
    }
    
    public function create(){
        $session = Session::get();
        return view('',['session'=> $session]);
    }
    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'user' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'password' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'identification_card' => 'required|regex:/^([0-9]*)$/|between:8,11',
        ]);

        Session::create([
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
        $session = Session::find($session->id);
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
    public function destroy(Session $session){
        
        $session = Session::find($session->id);
        $session->delete();
        return redirect()->route('session.index');

    }
}