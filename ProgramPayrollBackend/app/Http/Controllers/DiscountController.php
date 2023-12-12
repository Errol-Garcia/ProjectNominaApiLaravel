<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discount = Discount::get();
        //dd($descuento);
        return view('configuration.discount.ConfigurationDiscount',
            ['discount'=> $discount]);
    }
    public function create(){
        $discount = Discount::get();
        return view('configuration.discount.ConfigurationDiscountCreate',
            ['discount'=> null]);
    }
    public function store(Request $request){
        
        $request->validate([
            'arl' => 'required|decimal:0,5',
            'health' => 'required|decimal:0,5',
            'pension' => 'required|decimal:0,5',
            'parafiscal' => 'required|decimal:0,5',
            'registration_date' => 'required|date'
        ]);

        Discount::create([
            'arl' => $request->arl,
            'health' => $request->health,
            'pension' => $request->pension,
            'parafiscal' => $request->parafiscal,
            'registration_date' => $request->registration_date,
        ]);
        return redirect()->route('discount.index');
    }
    public function show(){
    }
    public function edit(Discount $discount){
        $discount = Discount::find($discount->id);
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

        $discount->update([
            'arl' => $request->arl,
            'health' => $request->health,
            'pension' => $request->pension,
            'parafiscal' => $request->parafiscal,
            'registration_date' => $request->registration_date,
        ]);

        return redirect()->route('discount.index');
    }
    
    public function destroy(Discount $discount){
        
        $discount = Discount::find($discount->id);
        $discount->delete();
        return redirect()->route('discount.index');

    }
}