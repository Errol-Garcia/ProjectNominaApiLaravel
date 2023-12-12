<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::get();
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

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        Department::create([
            'name' => $request->name
        ]);

        return redirect()->route('department.index');
    }

    public function show()
    {
    }
    public function edit(Department $department)
    {
        $department = Department::find($department->id);
        return view(
            'configuration.department.DepartmentUpdating',
            ['department' => $department]
        );
    }
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
        ]);

        $department->update([
            'name' => $request->name
        ]);

        return redirect()->route('department.index');
    }
    public function destroy(Department $department)
    {

        $department = Department::find($department->id);
        $department->delete();
        return redirect()->route('department.index');

    }
}