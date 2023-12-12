<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Log_payroll;
use App\Models\registered_payroll;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredPayrollController extends Controller
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
        $log = Log_payroll::with('employee')->where('registered_payroll_id',$request->registered_payroll_id)->get()->toArray();
        
        $registered_payrolls = registered_payroll::get();

        $response =  ['salaries'=>$log, 'registered_payrolls'=>$registered_payrolls];

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}