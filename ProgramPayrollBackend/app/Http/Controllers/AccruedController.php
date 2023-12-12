<?php

namespace App\Http\Controllers;

use App\Models\Accrued;
use Illuminate\Http\Request;

class AccruedController extends Controller
{
    public function index(){
        $accrued = Accrued::get();
        //dd($Accrued);
        return view('configuration.accrued.ConfigurationAccrued',
            ['accrued'=> $accrued]);
    }
    public function create(){
        $accrued = Accrued::get();
        return view('configuration.accrued.ConfigurationAccruedCreate',
            ['accrued'=> null]);
    }
    public function store(Request $request){
        //dd($request);
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);
        Accrued::create([
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);
        return redirect()->route('accrued.index');
    }
    public function show(){
    }
    public function edit(Accrued $accrued){
        //dd($accrued);
        $accrued = Accrued::find($accrued->id);
        //dd($accrued);

        return view('configuration.accrued.ConfigurationAccruedUpdating',
            ['accrued'=> $accrued]);
    }
    public function update(Request $request, Accrued $accrued){
        
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);
        

        $accrued->update([
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);

        return redirect()->route('accrued.index');
    }

    public function destroy(Accrued $accrued){
        
        $accrued = Accrued::find($accrued->id);
        $accrued->delete();
        return redirect()->route('accrued.index');

    }
}