<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Models\Session;
use App\Models\User;

use Illuminate\Support\Facades\Http;
class RegisteredUserSessionController extends Controller
{
    public function create(){

        $url = env('URL_SERVER_API');
        $response = Http::get($url.'/role');
        $roles = $response->json()["data"];
        return view("auth.Register", ['roles'=>$roles]);
    }
    public function store(Request $request){
        $url = env('URL_SERVER_API');

        $request->validate([
            'name' => 'required|string|max:255|min:8',
            'user' => 'required|string|max:255|min:8|unique:users',
            'password' => ['required',Password::default()]
        ]);

        $response = Http::post($url . '/register', [
            'name' => $request->name,
            'user' => $request->email,
            'password' => $request->password,
            'identification_card'=> $request->identification_card,
            'role_id'=> $request->role_id
        ]);
        
        if ($response->successful()) {
            return redirect()->route('login')->with(['message' => 'Usuario registrado correctamente']);
        } else {
            return redirect()->route('login')->withErrors(['message' => 'Error al registrar usuario']);
        }
    }
}