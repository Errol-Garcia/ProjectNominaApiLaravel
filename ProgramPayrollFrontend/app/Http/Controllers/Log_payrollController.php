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
        $response = Http::get($url. '/v1/log_payroll');
        $log = $response->json()["data"];
        
        $response2 = Http::get($url. '/v1/registered_payroll');
        $registered_payrolls = $response2->json()["data"];

        return view('configuration.logPayroll.logPayrollList', ['salaries'=>$log, 'registered_payrolls'=>$registered_payrolls]);
    }
    public function create(){
    }
    public function store(Request $request){
        
        $url = env('URL_SERVER_API');
        $request = json_decode($request->input('salaries'));
        

        $response = Http::post($url. '/v1/registered_payroll',[
            'registration_date' => Carbon::now()->format('Y-m-d'),
            
        ]);

        $log = $response->json()["data"];
        //dd($request);
        if ($response->successful()){
            

            foreach($request as $sueldo){
                
                $response = Http::post($url. '/v1/log_payroll', [
                    'worked_days'=> $sueldo->worked_days,
                    'extra_hours'=>$sueldo->extra_hours,
                    'hour_value'=>$sueldo->hour_value,
                    'bono'=>$sueldo->bono,
                    'accrued_value'=>$sueldo->accrued_value,
                    'discount_value'=>$sueldo->discount_value,
                    'net_income'=>$sueldo->net_income,
                    'employee_id'=>$sueldo->employee->id,
                    'registered_payroll_id'=>$log['id']
                ]);
            }
            $this->eliminar($request);
            return redirect()->route('logPayroll.index');
        }
        
    }
    public function show(int $salary){
        
    }
    public function edit(int $salary){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount');
        $discounts = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued');
        $accrued = $response->json()["data"];

        $response = Http::get($url . '/v1/log_payroll/'.$salary);
        $salary = $response->json()["data"];
        
        $response = Http::get($url . '/v1/discount/'.$salary['discount']['id']);
        $discount_salary = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued/'.$salary['accrued']['id']);
        $accrued_salary = $response->json()["data"];

        return view('configuration.employee.EmployeePayrollUpdating', 
            ['salary'=>$salary,'accrueds'=> $accrued, 'discounts'=>$discounts,
            'accrued_salary'=> $accrued_salary, 'discount_salary'=>$discount_salary,
            ]);
    }
    public function update(Request $request){
    }
    public function destroy(int $id){
        $url = env('URL_SERVER_API');
        //dd($id);
        $response = Http::delete($url.'/v1/payroll/'.$id);
        //dd($response);
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
        
        //$url = env('URL_SERVER_API');
       // dd($salaries);
        foreach($salaries as $salary){
            $this->destroy($salary->id);
           // $response = Http::delete($url . '/v1/payroll/'.$salary->id);
            };
    }
}