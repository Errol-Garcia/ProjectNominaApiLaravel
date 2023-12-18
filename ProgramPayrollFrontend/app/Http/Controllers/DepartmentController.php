<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepartmentController extends Controller
{
    public function index()
    {
         
        $url = env('URL_SERVER_API');
        $response = Http::get('http://127.0.0.1:8020/api/v1/department');
        $department = $response->json()["data"];
        
        return view(
            'configuration.department.DepartmentList',
            ['department' => $department]
        );
    }
    public function create()
    {
        //$department = Department::get();
        return view(
            'configuration.department.DepartmentCreate',
            ['department' => null]
        );
    }
    public function store(Request $request)
    {

        $url = env('URL_SERVER_API');
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        $response = Http::post('http://127.0.0.1:8020/api/v1/department', [
            'name' => $request->name
        ]);

        if($response->successful()){
            return redirect()->route('department.index')->with(['message'=> 'Devengado agregado correctamente']);
        }else{
            return redirect()->route('department.index')->withErrors(['message'=> 'Error al registrar al Devengado']);
        }
    }

    public function show()
    {
    }
    public function edit(int $department)
    {
        $url = env('URL_SERVER_API');
        $response = Http::get('http://127.0.0.1:8020/api/v1/department/'.$department);
        $department = $response->json()["data"];
        
        return view(
            'configuration.department.DepartmentUpdating',
            ['department' => $department]
        );
    }
    public function update(Request $request, int $id)
    {
        $url = env('URL_SERVER_API');
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        $response = Http::put('http://127.0.0.1:8020/api/v1/department/'.$id,[
            'name' => $request->name
        ]);
        
        if($response->successful()){
            return redirect()->route('department.index')->with(['message'=> 'Devengado agregado correctamente']);
        }else{
            return redirect()->route('department.index')->withErrors(['message'=> 'Error al registrar al Devengado']);
        }
    }
    public function destroy(int $department)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete('http://127.0.0.1:8020/api/v1/department/'.$department);
        
        if($response->successful()){
            return redirect()->route('department.index')->with(['message'=> 'Departamento actualizado correctamente']);
        }else{
            return redirect()->route('department.index')->withErrors(['message'=> 'Error al actualizar el Departamento']);
        }
    }
}