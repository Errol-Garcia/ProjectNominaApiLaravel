<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discount = Discount::get();
        return DiscountResource::collection($discount);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->arl = $request->input('arl');
        $discount->health = $request->input('health');
        $discount->pension = $request->input('pension');
        $discount->parafiscal = $request->input('parafiscal');
        $discount->registration_date =  $request->input('registration_date');

        $discount->save();

        return response()->json([
            'message'=> 'Los datos del descuento han sido Guardados',
            'data'=> $discount
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return new DiscountResource($discount);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $discount->update($request->all());
        return response()->json([
            'message'=> 'Los datos del descuento se han actualizado',
            'data'=> $discount
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return response()->json([
            'message'=> 'Los datos del descuento han sido eliminados'
        ], Response::HTTP_ACCEPTED);
    }
}