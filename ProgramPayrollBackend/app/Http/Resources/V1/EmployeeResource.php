<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\SalaryResource;
use App\Http\Resources\V1\LogPayrollResource;
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
            'email'=> $this->email,
            'department'=>[
                'id'=>$this->department->id,
                'name'=>$this->department->name
            ],
            'post'=>[
                'id'=>$this->post->id,
                'name'=>$this->post->name
            ],
        ];
    }
}