<?php

namespace App\Http\Controllers;

use App\Models\Accrued;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccruedController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API');
        
        $response = Http::get($url.'/v1/accrued');
        $accrued = $response->json()["data"];
        return view('configuration.accrued.ConfigurationAccrued',
            ['accrued'=> $accrued]);
    }
    public function create(){
        return view('configuration.accrued.ConfigurationAccruedCreate',
            ['accrued'=> null]);
    }
    public function store(Request $request){
        $url = env('URL_SERVER_API');
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);
        $response = Http::post($url.'/v1/accrued', [
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado agregado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al registrar al Devengado']);
        }
    }
    public function show(){
    }
    public function edit(int $accrued){

        $url = env('URL_SERVER_API');
        $response = Http::get($url.'/v1/accrued/'.$accrued);
        $accrued = $response->json()["data"];

        return view('configuration.accrued.ConfigurationAccruedUpdating',
            ['accrued'=> $accrued]);
    }
    public function update(Request $request, int $id){
        
        $url = env('URL_SERVER_API');
        $request->validate([
            'feeding' => 'required|decimal:0,5',
            'living_place' => 'required|decimal:0,5',
            'transport' => 'required|decimal:0,5',
            'extra' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);

        $response = Http::put($url.'/v1/accrued/'.$id, [
            'feeding'=> $request->feeding,
            'living_place'=> $request->living_place,
            'transport'=> $request->transport,
            'extra'=> $request->extra,
            'registration_date'=> $request->registration_date
        ]);
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado actualizado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al actualizar el Devengado']);
        }
    }

    public function destroy(int $accrued){
        $url = env('URL_SERVER_API');
        $response = Http::delete($url.'/v1/accrued/'.$accrued);
        
        if($response->successful()){
            return redirect()->route('accrued.index')->with(['message'=> 'Devengado actualizado correctamente']);
        }else{
            return redirect()->route('accrued.index')->withErrors(['message'=> 'Error al actualizar el Devengado']);
        }
    }
}