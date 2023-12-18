<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    public function index(){
        
        $url = env('URL_SERVER_API');

        $response = Http::get($url . '/v1/employee');
        $employee = $response->json()["data"];

        $response = Http::get($url . '/v1/post');
        $post = $response->json()["data"];

        $response = Http::get($url . '/v1/department');
        $department = $response->json()["data"];

        return view('configuration.employee.EmployeeList',['employee'=> $employee, 'post'=>$post, 'department'=>$department]);
    }
    
    public function create(){
        $url = env('URL_SERVER_API');

        $response = Http::get($url . '/v1/post');
        $post = $response->json()["data"];

        $response = Http::get($url . '/v1/department');
        $department = $response->json()["data"];

        return view('configuration.employee.EmployeeCreate',['employee'=> null, 'post'=>$post, 'department'=>$department]);
    }
    public function store(Request $request){
        
        $url = env('URL_SERVER_API');

        $request->validate([
            'identification_card' => 'required|regex:/^([0-9]*)$/',
            'names' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'last_names' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'salary' => 'required|required|custom_decimal',
            'number_phone' => 'required|regex:/^([0-9]*)$/',
            'address' => 'required|regex:/^([A-Za-zÑñ0-9\s\-,]*)$/|between:3,100',
            'email' => 'required|string|email|max:255|min:8',
            'department_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);
        //dd($request);
        $response = Http::post($url . '/v1/employee', [
            'identification_card'=> $request->identification_card,
            'names'=> $request->names,
            'last_names'=> $request->last_names,
            'salary'=> $request->salary,
            'number_phone'=> $request->number_phone,
            'address'=> $request->address,
            'email'=> $request->email,
            'department_id'=> $request->department_id,
            'post_id'=> $request->post_id,
        ]);
        
        if($response->successful()){
            return redirect()->route('employee.index')->with(['message'=> 'Empleado agregado correctamente']);
        }else{
            return redirect()->route('employee.index')->withErrors(['message'=> 'Error al registrar al Empleado']);
        }
    }
    public function show(){
    }
    public function edit(int $employee){

        $url = env('URL_SERVER_API');

        $response = Http::get($url . '/v1/employee/'.$employee);
        $employee = $response->json()["data"];

        $response = Http::get($url . '/v1/post');
        $post = $response->json()["data"];

        $response = Http::get($url . '/v1/department');
        $department = $response->json()["data"];

        return view('configuration.employee.EmployeeUpdating',
        ['employee'=> $employee, 'post'=>$post, 'department'=>$department]);
    }
    public function update(Request $request, int $employee){

        $url = env('URL_SERVER_API');

        $request->validate([
            'identification_card' => 'required|regex:/^([0-9]*)$/',
            'names' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'last_names' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'salary' => 'required|required|custom_decimal',
            'number_phone' => 'required|regex:/^([0-9]*)$/',
            'address' => 'required|regex:/^([A-Za-zÑñ0-9\s\-,]*)$/|between:3,100',
            'email' => 'required|string|email|max:255|min:8',
            'department_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);

        $response = Http::put($url . '/v1/employee/'.$employee, [
            'identification_card'=> $request->identification_card,
            'names'=> $request->names,
            'last_names'=> $request->last_names,
            'salary'=> $request->salary,
            'number_phone'=> $request->number_phone,
            'address'=> $request->address,
            'email'=> $request->email,
            'department_id'=> $request->department_id,
            'post_id'=> $request->post_id,
        ]);

        return redirect()->route('employee.index');
    }
    public function destroy(int $employee){
        $url = env('URL_SERVER_API');
        
        $response = Http::delete($url . '/v1/employee/'.$employee);

        return redirect()->route('employee.index');
        
        if($response->successful()){
            return redirect()->route('employee.index')->with(['message'=> 'Empleado actualizado correctamente']);
        }else{
            return redirect()->route('employee.index')->withErrors(['message'=> 'Error al actualizar el Empleado']);
        }
    }
}