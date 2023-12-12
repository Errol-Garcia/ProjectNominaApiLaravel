<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'identification_card'=>$this->identification_card,
            'names' =>$this->names,
            'last_names'=> $this->last_names,
            'salary'=> $this->salary,
            'number_phone'=> $this->number_phone,
            'address'=> $this->address,
            'email'=> $this->number_phone,
            'department'=>[
                'id'=>$this->department->id,
                'name'=>$this->department->name
            ],
            'post'=>[
                'id'=>$this->post->id,
                'name'=>$this->post->name
            ],
            //'log_payrolls' =>Log_payrollResource::collection($this->log_payrolls),
            //'salaries' =>SalaryResource::collection($this->salaries)
        ];
    }
}