<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\LogPayroll;
use Illuminate\Http\Request;
use App\Models\RegisteredPayroll;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RegisteredPayrollResource;
use Illuminate\Http\Response;

class RegisteredPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $registered_payrolls = RegisteredPayroll::get();
        return RegisteredPayrollResource::collection($registered_payrolls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registeredPayroll = new RegisteredPayroll();

        $registeredPayroll->registration_date = $request->input('registration_date');
        $registeredPayroll->save();
        /*$log = LogPayroll::with('employee')->where('registered_payroll_id',$request->registered_payroll_id)->get()->toArray();
        
        $registered_payrolls = RegisteredPayroll::get();

        $response =  ['salaries'=>$log, 'registered_payrolls'=>$registered_payrolls];
*/
        return response()->json([
            'message'=> 'Los datos del registro de nomina han sido Guardados',
            'data'=> $registeredPayroll
        ], Response::HTTP_ACCEPTED);

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