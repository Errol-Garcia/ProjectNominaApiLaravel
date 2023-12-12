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

class RegisteredUserSessionController extends Controller
{
    public function create(){

        $roles = Role::get();
        return view("auth.Register", ['roles'=>$roles]);
    }
    public function store(Request $request){
        //dd($request);

        $request->validate([
            'name' => 'required|string|max:255|min:8',
            'email' => 'required|string|email|max:255|min:8|unique:users',
            'password' => ['required','confirmed',Password::default()]
        ]);
        //dd($request);
        User::create([
            'name' => $request->name,
            'user' => $request->user,
            'password'=> bcrypt($request->password),
            'identification_card'=> $request->identification_card,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('login');
    }
}
