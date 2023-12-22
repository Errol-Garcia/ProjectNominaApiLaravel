<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SalaryResource;
use App\Http\Resources\V1\SalaryResourceDetail;
use App\Models\Accrued;
use App\Models\Discount;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salary = Salary::with('employee')->get();//->toArray();
        return SalaryResourceDetail::collection($salary);
        //return $salary;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $salary = new Salary();
        $salary->worked_days = $request->input('worked_days');
        $salary->extra_hours = $request->input('extra_hours');
        $salary->hour_value = $request->input('hour_value');
        $salary->bono = $request->input('bono');
        $salary->accrued_value = $TotalesAccrueds;
        $salary->discount_value = $TotalDiscounts;
        $salary->net_income = $NetoPagar;
        $salary->employee_id = $request->input('employee_id');
        $salary->discount_id = $request->input('discount_id');
        $salary->accrued_id = $request->input('accrued_id');


        $salary->save();
        $response = [
            'employee' => null,
            'salary'=>null, 
            'accrued'=>null,
            'discounts'=>null,
            'mensaje'=>"registrado"
        ];
        return response()->json([
            'message'=> 'Los datos del departamento han sido Guardados',
            'data'=> $response
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_employee)
    {
        
        $Salary = Salary::where('employee_id',$id_employee)->first();
        if($Salary == null){
            return null;
        }else{
            return new SalaryResourceDetail($Salary);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $salary = Salary::find($request->id);
        $discount = Discount::find($request->discount_id);
        $accrued = Accrued::find($request->accrued_id);
        $employee = Employee::find($request->employee_id)->first();

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

        return response()->json([
            'message'=> 'Los datos del salario  se han actualizado',
            'data'=> $salary
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $salary)
    {
        $log = DB::select('
        DELETE FROM public.salaries
	        WHERE id=?', [$salary]);
        
        //$salary->delete();
        return response()->json([
            'message'=> 'Los datos del salarios han sido eliminados'
        ], Response::HTTP_ACCEPTED);
    }
}