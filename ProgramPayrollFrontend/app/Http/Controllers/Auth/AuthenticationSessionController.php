<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class AuthenticationSessionController extends Controller
{    
public function create(){
    return view("auth.Login");
}
public function store(Request $request){

    $url = env('URL_SERVER_API');

    $request->validate(
        [
            'user' => 'required|string|max:255|min:8',
            'password' => 'required|string'
        ]
    );
    
    $response = Http::post($url . '/login', [
        'user' => $request->user,
        'password' => $request->password,
        'name' => 'browser',
    ]);
    //Incorrecto, genera excepción y retorna al formulario de login
    if ($response->successful()) {
        $data = $response->json();
        // dd($data);
        $request->session()->put('api_token', $data['token']);
        $request->session()->put('user_name', $data['name']);
        $request->session()->put('user_user', $data['user']);

        //Crear el archivo de la sesión
        //Almacenando datos mientras esta en la sesión
        $request->session()->regenerate();

        // dd($request->session());

        return redirect()->route('home');
    } else {
        // back()->withErrors([
        //     'message' => 'Credenciales invalidas'
        // ]);

        return redirect()->route('home')->withErrors(['message' => 'Credenciales invalidas']);
    }
    
    
}

public function destroy(Request $request) {

    $url = env('URL_SERVER_API');

    $response = Http::withHeaders(['Authorization' => 'Bearer ' . $request->session()->get('api_token')])->post($url . '/logout');

    if ($response->successful()) {
        $request->session()->forget('api_token');
        //Destruir el archivo de sesión
        $request->session()->invalidate();
        //Obtener un nuevo token
        $request->session()->regenerateToken();

        return redirect()->route('login');
    } else {
        return redirect()->route('login')->withErrors(['message' => 'Error al cerrar sesión']);
    }
}

}