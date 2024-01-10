<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Accrued;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class SalaryController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/payroll');
        $salary = $response->json()["data"];

        return view('configuration.employee.EmployeePayroll', ['salaries'=>$salary]);
    }
    public function create(Request $request){

        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount');
        $discounts = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued');
        $accrueds = $response->json()["data"];

        $salary = '';

        $response = Http::get($url. '/v1/employee/'.$request->identification_card);
        //dd($response->json());
        if($response->json() != null){
            $employee = $response->json()["data"];
        }else{
            $employee = null;
        }
        
        if($employee != null){
            $response = Http::get($url. '/v1/payroll/'.$employee['id']);
            if ($response->json() == null){
                $salary = null;
            }else{
                $salary = $response->json()["data"];
            }
        }

        return view('configuration.employee.EmployeePayrollPartial',
        ['employee' => $employee, 'salary'=>$salary,
    'accrueds'=> $accrueds, 'discounts'=>$discounts]);
    }
    public function store(Request $request){

        $url = env('URL_SERVER_API');
        $response = Http::post($url. '/v1/payroll',[
            'worked_days'=> $request->worked_days,
            'extra_hours'=>$request->extra_hours,
            'hour_value'=>$request->hour_value,
            'bono'=>$request->bono,
            'employee_id'=>$request->employee_id,
            'discount_id'=>$request->discount_id,
            'accrued_id'=>$request->accrued_id,
        ]);

        return view('configuration.employee.EmployeePayrollPartial',
        ['employee' => null, 'salary'=>null,
        'accrued'=> null, 'discount'=>null, 'mensaje'=>"registrado"]);

    }
    public function show(Request $request, $identification_card){

        $url = env('URL_SERVER_API');
        $response = Http::get($url. '/v1/employee/'.$request->identification_card);
        $employee = $response->json()["data"];

    }
    public function edit(int $salary){
        //dd(/*$discount, $Accrued, */$salary);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount');
        $discounts = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued');
        $accrued = $response->json()["data"];

        $response = Http::get($url . '/v1/payroll/'.$salary);
        dd($url, $response);
        $salary = $response->json()["data"];
        
        dd($salary);

        $response = Http::get($url . '/v1/discount/'.$salary['discount']['id']);
        $discount_salary = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued/'.$salary['accrued']['id']);
        $accrued_salary = $response->json()["data"];

        return view('configuration.employee.EmployeePayrollUpdating', 
            ['salary'=>$salary,'accrueds'=> $accrued, 'discounts'=>$discounts,
            'accrued_salary'=> $accrued_salary, 'discount_salary'=>$discount_salary,
            ]);
    }
    
    public function update(Request $request, int $salary){
        //dd($salary, $request);
        $url = env('URL_SERVER_API');

        $response = Http::put($url. '/v1/payroll/'. $salary,[
            'id'=>$request->id,
            'worked_days'=> $request->worked_days,
            'extra_hours'=>$request->extra_hours,
            'hour_value'=>$request->hour_value,
            'bono'=>$request->bono,
            'employee_id'=>$request->employee_id,
            'accrued_id'=>$request->accrued_id,
            'discount_id'=>$request->discount_id,
        ]);
        

        if($response->successful()){
            return redirect()->route('payroll.index')->with(['message'=> 'Salario actualizado correctamente']);
        }else{
            return redirect()->route('payroll.index')->withErrors(['message'=> 'Error al registrar al Salario']);
        }
    }
    public function destroy($id){

    }
}