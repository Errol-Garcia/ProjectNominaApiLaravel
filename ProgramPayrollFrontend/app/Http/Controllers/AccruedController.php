<?php

namespace App\Http\Controllers;

use App\Models\Accrued;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccruedController extends Controller
{
    public function index(){
        //$accrued = Accrued::get();
        //dd($Accrued);
        $url = env('URL_SERVER_API');
        //dd($url);
        $response = Http::get('http://127.0.0.1:8020/api/v1/accrued');
        //dd($response);
        $accrued = $response->json()["data"];
        return view('configuration.accrued.ConfigurationAccrued',
            ['accrued'=> $accrued]);
    }
    public function create(){
        //$accrued = Accrued::get();
        return view('configuration.accrued.ConfigurationAccruedCreate',
            ['accrued'=> null]);
    }
    public function store(Request $request){
        //dd($request);
        $url = env('URL_SERVER_API');
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);

        $response = Http::post('http://127.0.0.1:8020/api/accrued', [
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);
/*
        Accrued::create([
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);*/
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado agregado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al registrar al Devengado']);
        }
    }
    public function show(){
    }
    public function edit(Request $accrued){
        //dd($accrued);
        $url = env('URL_SERVER_API');
        $response = Http::get('http://127.0.0.1:8020/api/v1/accrued/'.$accrued->id);
        $accrued = $response->json()["data"];
        
        //$accrued = Accrued::find($accrued->id);
        //dd($accrued);

        return view('configuration.accrued.ConfigurationAccruedUpdating',
            ['accrued'=> $accrued]);
    }
    public function update(Request $request){
        
        $url = env('URL_SERVER_API');
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);
        $response = Http::put($url . '/accrued', [
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);

        /*$accrued->update([
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);*/
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado actualizado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al actualizar el Devengado']);
        }
    }

    public function destroy(request $accrued){
        $url = env('URL_SERVER_API');
        $response = Http::delete('http://127.0.0.1:8020/api/v1/accrued/'.$accrued->id);
        
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado actualizado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al actualizar el Devengado']);
        }
    }
}