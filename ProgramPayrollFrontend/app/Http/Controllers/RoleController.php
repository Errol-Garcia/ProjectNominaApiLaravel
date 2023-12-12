<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoleController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/role');
        $role = $response->json()["data"];
        
        return view('');
    }
    public function create(){
    }
    public function store(Request $request){
        
    }
    public function show(){
    }
    public function edit($id){
    }
    public function update(Request $request){
    }
    public function destroy($id){
        
    }
}