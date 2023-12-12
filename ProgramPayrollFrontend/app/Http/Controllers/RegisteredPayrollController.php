<?php

namespace App\Http\Controllers;

use App\Models\Log_payroll;
use App\Models\registered_payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisteredPayrollController extends Controller
{
    public function index(){
    }
    public function create(){

    }

    //TODO
    public function store(Request $request){
        //dd($request);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/registeredPayroll');
        $registered_payrolls = $response->json()["data"];

        $response = Http::get($url . '/v1/logPayroll');
        $registered_payrolls = $response->json()["data"];
        
        //$log = Log_payroll::with('employee')->where('registered_payroll_id',$request->registered_payroll_id)->get()->toArray();
        //$log = DB::select('SELECT * FROM log_payrolls as l inner join employees as e on l.employee_id=e.id');
        //dd($log);
        $registered_payrolls = registered_payroll::get();
        return view('configuration.logPayroll.logPayrollList', ['salaries'=>$log, 'registered_payrolls'=>$registered_payrolls]);
   
    }

    
    public function show(){
    }

    public function edit(Request $request){
    
    }
    public function update(){

    }
    public function destroy(){


    }
}