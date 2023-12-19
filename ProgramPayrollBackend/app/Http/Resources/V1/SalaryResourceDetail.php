<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResourceDetail extends JsonResource
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
            'worked_days'=>$this->worked_days,
            'extra_hours' =>$this->extra_hours,
            'hour_value'=> $this->hour_value,
            'bono'=> $this->bono,
            'net_income'=> $this->net_income,
            'accrued_value'=> $this->accrued_value,
            'discount_value'=>$this->discount_value,
            'employee'=>[
                'id'=> $this->employee->id,
                'identification_card'=>$this->employee->identification_card,
                'names' =>$this->employee->names,
                'last_names'=> $this->employee->last_names,
                'salary'=> $this->employee->salary,
                'number_phone'=> $this->employee->number_phone,
                'address'=> $this->employee->address,
                'email'=> $this->employee->number_phone,
            ],
            'discount'=>[
                'id'=> $this->discount->id,
                'arl'=> $this->discount->arl,
                'health'=> $this->discount->health,
                'pension'=> $this->discount->pension,
                'parafiscal'=> $this->discount->parafiscal,
                'registration_date'=> $this->discount->registration_date
            ],
            'accrued'=>[
                'id'=> $this->accrued->id,
                'feeding'=> $this->accrued->feeding,
                'living_place'=> $this->accrued->living_place,
                'transport'=> $this->accrued->transport,
                'extra'=> $this->accrued->extra,
                'registration_date'=> $this->accrued->registration_date
            ]
        ];
    }
}