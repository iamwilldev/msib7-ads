<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'employee_number' => $this->employee_number,
            'name' => $this->name,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'date_of_hire' => $this->date_of_hire,
            'remaining_cuti' => $this->remaining_cuti,
        ];
    }
}
