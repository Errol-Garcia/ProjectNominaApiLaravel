<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EmployeeResource;
use App\Models\Employee;
use App\Models\Post;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();
        $posts = Post::get();
        $departments = Department::get();
        
        $response =[
            'employees' => $employees,
            'posts' => $posts,
            'departments' => $departments,
        ];
        return EmployeeResource::collection($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->identification_card = $request->input('identification_card');
        $employee->names = $request->input('names');
        $employee->last_names = $request->input('last_names');
        $employee->salary = $request->input('salary');
        $employee->number_phone = $request->input('number_phone');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        $employee->department_id = $request->input('department_id');
        $employee->post_id = $request->input('post_id');

        $employee->save();

        return response()->json([
            'message'=> 'Los datos del empleado han sido Guardados',
            'data'=> $employee
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return response()->json([
            'message'=> 'Los datos de empleado  se han actualizado',
            'data'=> $employee
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message'=> 'Los datos del empleado han sido eliminados'
        ], Response::HTTP_ACCEPTED);
    }
}