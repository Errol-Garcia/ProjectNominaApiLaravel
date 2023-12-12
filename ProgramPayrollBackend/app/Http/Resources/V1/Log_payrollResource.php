<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Log_payrollResource extends JsonResource
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
            'registration_date'=> $this->registration_date,
            'employee'=>[
                'id'=> $this->id,
                'identification_card'=>$this->identification_card,
                'names' =>$this->names,
                'last_names'=> $this->last_names,
                'salary'=> $this->salary,
                'number_phone'=> $this->number_phone,
                'address'=> $this->address,
                'email'=> $this->number_phone,
            ],
            'registered_payrolls'=>[
                'id'=>$this->department->id,
                'registration_date'=>$this->registered_payroll->registration_date
            ]
        ];
    }
}