<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'employees';

    protected $fillable = [
        'employee_number',
        'name',
        'address',
        'date_of_birth',
        'date_of_hire',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_hire' => 'date',
    ];

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
}
