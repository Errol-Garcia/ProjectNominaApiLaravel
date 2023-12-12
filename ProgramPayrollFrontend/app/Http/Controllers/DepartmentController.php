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
        $response = Http::get($url . '/v1/department');
        $department = $response->json()["data"];
        
        return view(
            'configuration.department.DepartmentList',
            ['department' => $department]
        );
    }
    public function create()
    {
        $department = Department::get();
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

        $response = Http::post([
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
    public function edit(Department $department)
    {
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/department/'.$department->id);
        $department = $response->json()["data"];
        
        return view(
            'configuration.department.DepartmentUpdating',
            ['department' => $department]
        );
    }
    public function update(Request $request, Department $department)
    {
        $url = env('URL_SERVER_API');
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        $response = Http::put([
            'name' => $request->name
        ]);
        
        if($response->successful()){
            return redirect()->route('department.index')->with(['message'=> 'Devengado agregado correctamente']);
        }else{
            return redirect()->route('department.index')->withErrors(['message'=> 'Error al registrar al Devengado']);
        }
    }
    public function destroy(Department $department)
    {
        $url = env('URL_SERVER_API');
        $response = Http::delete($url . '/v1/department/'.$department->id);
        
        if($response->successful()){
            return redirect()->route('$department.index')->with(['message'=> 'Departamento actualizado correctamente']);
        }else{
            return redirect()->route('$department.index')->withErrors(['message'=> 'Error al actualizar el Departamento']);
        }
    }
}