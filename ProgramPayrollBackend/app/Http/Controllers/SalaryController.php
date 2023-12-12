<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Accrued;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SalaryController extends Controller
{
    public function index(){
        $salary = Salary::with('employee')->get()->toArray();
        //$salarie = Collection($salary);
        //dd($salarie);

        return view('configuration.employee.EmployeePayroll', ['salaries'=>$salary]);
    }
    public function create(Request $request){
        //dd($request);
        $discounts = Discount::get();
        $accrueds = Accrued::get();
        $salary = '';
        $employee = Employee::where('identification_card',$request->identification_card)->first();
        if($employee != null){
            $salary = DB::select('SELECT * FROM salaries where employee_id=?',[$employee->id]);
        }

        //dd($Accrued);

        return view('configuration.employee.EmployeePayrollPartial',
        ['employee' => $employee, 'salary'=>$salary,
    'accrueds'=> $accrueds, 'discounts'=>$discounts/*, 'identification_card'=>"df"*/]);
    }
    public function store(Request $request){
        $discount = Discount::find($request->discount_id);
        $accrued = Accrued::find($request->accrued_id);

        $transportation_assistance=0;
        if($request->salary <= 1160000){
            $transportation_assistance = $accrued->transporte;
        }
        $TotalBasic = ($request->salary*$request->worked_days)/30;

        $extras = ($request->hour_value*$request->extra_hours) + $request->bono;

        $TotalesAccrueds = $TotalBasic+$extras+$accrued->feeding+$accrued->living_place+$accrued->extra+$transportation_assistance;

        $health = ($TotalesAccrueds-$transportation_assistance)*($discount->health/100);
        $pension = ($TotalesAccrueds-$transportation_assistance)*($discount->pension/100);
        $arl = ($TotalesAccrueds-$transportation_assistance)*($discount->parafiscal/100);

        $TotalDiscounts = $health + $pension + $arl;
        $NetoPagar = $TotalesAccrueds - $TotalDiscounts;

        Salary::create([
            'worked_days'=> $request->worked_days,
            'extra_hours'=>$request->extra_hours,
            'hour_value'=>$request->hour_value,
            'bono'=>$request->bono,
            'accrued_value'=>$TotalesAccrueds,
            'discount_value'=>$TotalDiscounts,
            'net_income'=>$NetoPagar,
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

        $employee = Employee::where('identification_card',$identification_card);
        dd($employee);
        //$identification_card = $request->input('identification_card');

    }
    public function edit(int $salary){
        //dd(/*$discount, $Accrued, */$salary);
        $discounts = Discount::get();
        $accrued = Accrued::get();
        $salary = Salary::find($salary);
        $discount_salary = Discount::find($salary->discount_id);
        $accrued_salary = Accrued::find($salary->accrued_id);
        //$employee = Accrued::find($salary->employee_id);
        //dd($salary);
        return view('configuration.employee.EmployeePayrollUpdating', 
            ['salary'=>$salary,'accrueds'=> $accrued, 'discounts'=>$discounts,
            'accrued_salary'=> $accrued_salary, 'discount_salary'=>$discount_salary,
            ]);
    }
    
    public function update(Request $request, Salary $salary){
        $salary = Salary::find($request->id);
        $discount = Discount::find($request->discount_id);
        $accrued = Accrued::find($request->Accrued_id);
        $employee = Employee::find($salary->employee_id);
        //dd($salary, $request, $employee);

        $transportation_assistance=0;
        if($request->salary <= 1160000){
            $transportation_assistance = $accrued->transporte;
        }
        $TotalBasic = ($employee->salary*$request->worked_days)/30;

        $extras = ($request->hour_value*$request->extra_hours) + $request->bono;

        $TotalesAccrueds = $TotalBasic+$extras+$accrued->feeding+$accrued->living_place+$accrued->extra+$transportation_assistance;
        //$TotalesAccrueds = $TotalBasic+$transportation_assistance;
        $health = ($TotalesAccrueds-$transportation_assistance)*($discount->health/100);
        $pension = ($TotalesAccrueds-$transportation_assistance)*($discount->pension/100);
        $arl = ($TotalesAccrueds-$transportation_assistance)*($discount->parafiscal/100);

        $TotalDiscounts = $health + $pension + $arl;
        $NetoPagar = $TotalesAccrueds - $TotalDiscounts;

        $salary->update([
            'worked_days'=> $request->worked_days,
            'extra_hours'=>$request->extra_hours,
            'hour_value'=>$request->hour_value,
            'bono'=>$request->bono,
            'accrued_value'=>$TotalesAccrueds,
            'discount_value'=>$TotalDiscounts,
            'net_income'=>$NetoPagar,
            'discount_id'=>$request->discount_id,
            'Accrued_id'=>$request->Accrued_id,
        ]);
        return redirect()->route('payroll.index');
    }
    public function destroy($id){

    }
}