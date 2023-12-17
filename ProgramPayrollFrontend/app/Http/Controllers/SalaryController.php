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
        //$salary = Salary::with('employee')->get()->toArray();
        //dd($salarie);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/payroll');
        $salary = $response->json()["data"];

        return view('configuration.employee.EmployeePayroll', ['salaries'=>$salary]);
    }
    public function create(Request $request){
        //dd($request);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount');
        $discounts = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued');
        $accrueds = $response->json()["data"];

        $salary = '';

        $response = Http::get($url. '/v1/employee/'.$request->identification_card);
        $employee = $response->json()["data"];

        //$employee = Employee::where('identification_card',$request->identification_card)->first();
        
        if($employee != null){
            //TODO
            $response = Http::get($url. '/v1/salary/'.$employee->id);
            $salary = $response->json()["data"];
            //$salary = DB::select('SELECT * FROM salaries where employee_id=?',[$employee->id]);
        }

        //dd($Accrued);

        return view('configuration.employee.EmployeePayrollPartial',
        ['employee' => $employee, 'salary'=>$salary,
    'accrueds'=> $accrueds, 'discounts'=>$discounts/*, 'identification_card'=>"df"*/]);
    }
    public function store(Request $request){

        $url = env('URL_SERVER_API');
//TODO
        $response = Http::post($url. '/v1/salary',[
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

        //dd($request);
    }
    public function show(Request $request, $identification_card){

        $url = env('URL_SERVER_API');
        $response = Http::get($url. '/v1/employee/'.$request->identification_card);
        $employee = $response->json()["data"];

        //$employee = Employee::where('identification_card',$identification_card);
        //dd($employee);
        //$identification_card = $request->input('identification_card');

    }
    public function edit(int $salary){
        //dd(/*$discount, $Accrued, */$salary);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount');
        $discounts = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued');
        $accrued = $response->json()["data"];

        $response = Http::get($url . '/v1/payroll');
        $salary = $response->json()["data"];

        $response = Http::get($url . '/v1/discount/'.$salary->discount_id);
        $discount_salary = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued/'.$salary->accrued_id);
        $accrued_salary = $response->json()["data"];

        //$salary = Salary::find($salary);
        //$discount_salary = Discount::find($salary->discount_id);
        //$accrued_salary = Accrued::find($salary->accrued_id);
        //$employee = Accrued::find($salary->employee_id);
        //dd($salary);
        return view('configuration.employee.EmployeePayrollUpdating', 
            ['salary'=>$salary,'accrueds'=> $accrued, 'discounts'=>$discounts,
            'accrued_salary'=> $accrued_salary, 'discount_salary'=>$discount_salary,
            ]);
    }
    
    public function update(Request $request, Salary $salary){
        
        $url = env('URL_SERVER_API');
/*
        $response = Http::get($url . '/v1/payroll/'.$request->id);
        $salary = $response->json()["data"];

        $response = Http::get($url . '/v1/discount/'.$request->discount_id);
        $discount = $response->json()["data"];

        $response = Http::get($url . '/v1/accrued/'.$request->Accrued_id);
        $accrued_salary = $response->json()["data"];

        $response = Http::get($url. '/v1/employee/'.$salary->employee_id);
        $employee = $response->json()["data"];
*/
        //$salary = Salary::find($request->id);
        // $discount = Discount::find($request->discount_id);
        // $accrued = Accrued::find($request->Accrued_id);
        //$employee = Employee::find($salary->employee_id);
        //dd($salary, $request, $employee);

        $response = Http::put($url. '/v1/salary',[
            'worked_days'=> $request->worked_days,
            'extra_hours'=>$request->extra_hours,
            'hour_value'=>$request->hour_value,
            'bono'=>$request->bono,
            'discount_id'=>$request->discount_id,
            'Accrued_id'=>$request->Accrued_id,
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