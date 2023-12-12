<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        
        $user->name = $request->input('name');
        $user->user = $request->input('user');
        $user->password = $request->input('password');
        $user->identification_card = $request->input('identification_card');
        $user->role_id = $request->input('role_id');

        $user->save();

        return response()->json([
            'message'=> 'se ha registrado un usuario con éxito',
            'data'=> $user
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json([
            'message'=> 'se ha Actualizado un usuario con éxito',
            'data'=> $user
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=> 'se ha eliminado un usuario con éxito'
        ], Response::HTTP_ACCEPTED);
    }
}