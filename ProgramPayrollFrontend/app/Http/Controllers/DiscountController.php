<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscountController extends Controller
{
    public function index(){
        //dd($descuento);
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/$discount');
        $discount = $response->json()["data"];

        return view('configuration.discount.ConfigurationDiscount',
            ['discount'=> $discount]);
    }
    public function create(){
        $discount = Discount::get();
        return view('configuration.discount.ConfigurationDiscountCreate',
            ['discount'=> null]);
    }
    public function store(Request $request){
        
        
        $url = env('URL_SERVER_API');
        
        $request->validate([
            'arl' => 'required|decimal:0,5',
            'health' => 'required|decimal:0,5',
            'pension' => 'required|decimal:0,5',
            'parafiscal' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);

        $response = Http::post([
            'arl' => $request->arl,
            'health' => $request->health,
            'pension' => $request->pension,
            'parafiscal' => $request->parafiscal,
            'registration_date' => $request->registration_date,
        ]);

        if($response->successful()){
            return redirect()->route('discount.index')->with(['message'=> 'Descuento agregado correctamente']);
        }else{
            return redirect()->route('discount.index')->withErrors(['message'=> 'Error al registrar al Descuento']);
        }
    }
    public function show(){
    }
    public function edit(Discount $discount){
        
        $url = env('URL_SERVER_API');
        $response = Http::get($url . '/v1/discount/'.$discount->id);
        $discount = $response->json()["data"];
        return view('configuration.discount.ConfigurationDiscountUpdating',['discount'=> $discount]);
    }
    public function update(Request $request, Discount $discount){

        $request->validate([
            'arl' => 'required|decimal:0,5',
            'health' => 'required|decimal:0,5',
            'pension' => 'required|decimal:0,5',
            'parafiscal' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);

        $response = Http::put([
            'arl' => $request->arl,
            'health' => $request->health,
            'pension' => $request->pension,
            'parafiscal' => $request->parafiscal,
            'registration_date' => $request->registration_date,
        ]);

        if($response->successful()){
            return redirect()->route('discount.index')->with(['message'=> 'Descuento agregado correctamente']);
        }else{
            return redirect()->route('discount.index')->withErrors(['message'=> 'Error al registrar al Descuento']);
        }
    }
    
    public function destroy(Discount $discount){

        $url = env('URL_SERVER_API');
        $response = Http::delete($url . '/v1/discount/'.$discount->id);
        
        if($response->successful()){
            return redirect()->route('discount.index')->with(['message'=> 'Devengado actualizado correctamente']);
        }else{
            return redirect()->route('discount.index')->withErrors(['message'=> 'Error al actualizar el Devengado']);
        }
    }
}