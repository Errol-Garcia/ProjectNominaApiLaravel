<?php

namespace App\Http\Controllers;

use App\Models\Log_payroll;
use App\Models\registered_payroll;
use App\Models\Salary;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Log_payrollController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API');
        $response = Http::get($url. '/v1/logPayroll');
        $log = $response->json()["data"];
        
        $response = Http::get($url. '/v1/registeredPayroll');
        $registered_payrolls = $response->json()["data"];

        //$log = Log_payroll::with('employee')->get()->toArray();
        //$registered_payrolls = registered_payroll::get();
        return view('configuration.logPayroll.logPayrollList', ['salaries'=>$log, 'registered_payrolls'=>$registered_payrolls]);
    }
    public function create(){
    }
    public function store(Request $request){
        //$request2 = $request;
        $url = env('URL_SERVER_API');
        $request = json_decode($request->input('salaries'));
        //dd($request);
        
        /*$payroll = registered_payroll::create([
            'registration_date' => Carbon::now()->format('Y-m-d')
        ]);*/

        $response = Http::post($url. '/registeredPayroll',[
            'registration_date' => Carbon::now()->format('Y-m-d'),
            'salaries' => $request
        ]);
        if ($response->successful()){
            $id = $response->json("id");

            foreach($request as $sueldo){
                $response = Http::post($url. '/registered_payroll', [
                    'worked_days'=> $sueldo->worked_days,
                    'extra_hours'=>$sueldo->extra_hours,
                    'hour_value'=>$sueldo->hour_value,
                    'bono'=>$sueldo->bono,
                    'accrued_value'=>$sueldo->accrued_value,
                    'discount_value'=>$sueldo->discount_value,
                    'net_income'=>$sueldo->net_income,
                    'registration_date'=>(new DateTime())->format('Y-m-d'),
                    'employee_id'=>$sueldo->employee_id,
                    'registered_payroll_id'=>$id
                ]);
            }
            $this->eliminar($request);
            return redirect()->route('logPayroll.index');
        }
        //TODO 
        
    }
    public function show(){
        
    }
    public function edit($id){
    }
    public function update(Request $request){
    }
    public function destroy(Request $request){
        return redirect()->route('logPayroll.index');
    }
    public function almacenar($salaries){
        dd($salaries);
    }
    public function estadistica(){
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
        
        return view('configuration.logPayroll.statistic',['datas'=> $json]);
    }

    public function eliminar( $salaries){
        foreach($salaries as $salary){
            /*Salary::where(
                'employee_id',$salary->employee_id)->delete();
            */};
    }
}