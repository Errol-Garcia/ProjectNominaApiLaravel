<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'user' =>$this->user,
            'password'=> $this->password,
            'identification_card'=> $this->identification_card,
            'role'=> [
                'id'=>$this->role->id,
                'name'=>$this->role->name,
                'description'=>$this->role->description
            ]
        ];
    }
}