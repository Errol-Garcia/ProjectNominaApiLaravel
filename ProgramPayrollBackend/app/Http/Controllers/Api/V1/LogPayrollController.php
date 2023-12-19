<?php

namespace App\Http\Controllers\Api\V1;

use DateTime;
use App\Models\Salary;
use App\Models\LogPayroll;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\RegisteredPayroll;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LogPayrollResource;
use App\Http\Resources\V1\SalaryResourceDetail;

class LogPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $log = LogPayroll::with('employee')->get()->toArray();
        $registered_payrolls = RegisteredPayroll::get();
        $response = [
            'data'=>$log, 
            'registered_payrolls'=>$registered_payrolls
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $log_payroll = new LogPayroll();

        //foreach($request as $sueldo){
        $log_payroll->worked_days = $request->input('worked_days');
        $log_payroll->extra_hours = $request->input('extra_hours');
        $log_payroll->hour_value = $request->input('hour_value');
        $log_payroll->bono = $request->input('bono');
        $log_payroll->accrued_value = $request->input('accrued_value');
        $log_payroll->discount_value = $request->input('discount_value');
        $log_payroll->net_income = $request->input('net_income');
        $log_payroll->employee_id = $request->input('employee_id');
        $log_payroll->registered_payroll_id = $request->input('registered_payroll_id');
        $log_payroll->registration_date = (new DateTime())->format('Y-m-d');
        
        $log_payroll->save();
        //}
        return response()->json([
            'message'=> 'Los datos del historial han sido Guardados',
            'data'=> $log_payroll
        ], Response::HTTP_ACCEPTED);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_salary)
    {
        $Salary = Salary::Find($id_salary);
        if($Salary == null){
            return null;
        }else{
            return new SalaryResourceDetail($Salary);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LogPayroll $log_payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogPayroll $log_payroll)
    {
        //
    }

    public function almacenar($salaries){
        dd($salaries);
    }
    public function statistics(){
        $log = DB::select('SELECT e.names, e.last_names, AVG(l.net_income) as promedio_sueldo
        FROM log_payrolls as l
        JOIN employees as e ON e.id = l.employee_id
        GROUP BY e.names, e.last_names;
        ');

        $json="[";
        foreach($log as $obj){
            $json=$json."{";
            $json=$json.'"name":"'.$obj->names.' '.$obj->last_names.''.'",';
            $json=$json.'"y":'.$obj->promedio_sueldo;     
            $json=$json."},";    
        }
        $json=$json."]";
        $json=str_replace(",]","]",$json);
        
        return $json;
    }

    public function eliminar( $salaries){
        foreach($salaries as $salary){
            Salary::where(
                'employee_id',$salary->employee_id)->delete();
            };
    }
}