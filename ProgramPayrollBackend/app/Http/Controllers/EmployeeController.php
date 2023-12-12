<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::get();
        
        $post = Post::get();
        $department = Department::get();
        return view('configuration.employee.EmployeeList',['employee'=> $employee, 'post'=>$post, 'department'=>$department]);
    }
    
    public function create(){
        $employee = Employee::get();
        $post = Post::get();
        
        $department = Department::get();
        return view('configuration.employee.EmployeeCreate',['employee'=> null, 'post'=>$post, 'department'=>$department]);
    }
    public function store(Request $request, Employee $emplee, Post $post, department $department){
        
        
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
        Employee::create([
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
    public function show(){
    }
    public function edit(Employee $employee){
        $employee = Employee::find($employee->id);
        $post = post::get();
        $department = department::get();
        return view('configuration.employee.EmployeeUpdating',
        ['employee'=> $employee, 'post'=>$post, 'department'=>$department]);
    }
    public function update(Request $request, Employee $employee){

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

        $employee->update([
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
    public function destroy(Employee $employee){
        
        $employee = Employee::find($employee->id);
        $employee->delete();
        return redirect()->route('employee.index');

    }
}