<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\SalaryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'arl'=>$this->arl,
            'health' =>$this->health,
            'pension'=> $this->pension,
            'parafiscal'=> $this->parafiscal,
            'registration_date'=> $this->registration_date,
             //'salary' => SalaryResource::collection($this->salary)
        ];
    }
}