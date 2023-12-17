<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AccruedResource;
use App\Models\Accrued;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccruedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accrued = Accrued::get();
        return AccruedResource::collection($accrued);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $accrued = new Accrued();

        $accrued->feeding = $request->input('feeding');
        $accrued->living_place = $request->input('living_place');
        $accrued->transport = $request->input('transport');
        $accrued->extra = $request->input('extra');
        $accrued->registration_date = $request->input('registration_date');
    
        
        $accrued->save();

        return response()->json([
            'message'=> 'se ha registrado un devengado con éxito',
            'data'=> $accrued
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accrued $accrued)
    {
        return new AccruedResource($accrued);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accrued $accrued)
    {
        $accrued->update($request->all());
        return response()->json([
            'message'=> 'se ha Actualizado un devengado con éxito',
            'data'=> $accrued
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accrued $accrued)
    {
        $accrued->delete();
        return response()->json([
            'message'=> 'se ha eliminado un devengado con éxito'
        ], Response::HTTP_ACCEPTED);
    }
}