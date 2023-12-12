<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\LogPayrollDetailsResource;

class RegisteredPayrollResource extends JsonResource
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
            'registration_date'=>$this->registration_date,
            'payrolls' =>LogPayrollDetailsResource::collection($this->log_payrolls)
        ];
    }
}